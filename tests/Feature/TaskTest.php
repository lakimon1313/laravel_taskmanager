<?php

use App\Models\Task;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| PEST TESTING GUIDE — TaskController
|--------------------------------------------------------------------------
|
| Every test follows the same 3-step pattern:
|
|   1. ARRANGE  → Set up the data (create users, tasks, etc.)
|   2. ACT      → Perform an action (visit a page, submit a form)
|   3. ASSERT   → Check the result (page loads, database changed, etc.)
|
| Helpful methods:
|   $this->actingAs($user)   → "I'm logged in as this user"
|   $this->get('/url')       → Visit a page
|   $this->post('/url', [])  → Submit a form
|   ->assertOk()             → Page returned 200
|   ->assertRedirect('/url') → Page redirected somewhere
|   ->assertForbidden()      → Got a 403 error
|   $this->assertDatabaseHas('table', [...]) → Row exists in DB
|
*/

// ─── INDEX (listing tasks) ──────────────────────────────────────────

test('guests cannot view tasks', function () {
    // ACT: Visit /tasks without logging in
    $response = $this->get('/tasks');

    // ASSERT: Redirected to login page
    $response->assertRedirect('/login');
});

test('user can view their tasks', function () {
    // ARRANGE: Create a user with 3 tasks
    $user = User::factory()->create();
    Task::factory()->count(3)->create(['user_id' => $user->id]);

    // ACT: Visit /tasks as that user
    $response = $this->actingAs($user)->get('/tasks');

    // ASSERT: Page loads fine
    $response->assertOk();
});

test('user only sees their own tasks', function () {
    // ARRANGE: Two users, each with a task
    $me = User::factory()->create();
    $other = User::factory()->create();

    $myTask = Task::factory()->create(['user_id' => $me->id, 'title' => 'My Task']);
    $otherTask = Task::factory()->create(['user_id' => $other->id, 'title' => 'Not My Task']);

    // ACT: I visit /tasks
    $response = $this->actingAs($me)->get('/tasks');

    // ASSERT: I see my task, not the other person's
    $response->assertSeeText('My Task');
    $response->assertDontSeeText('Not My Task');
});

test('tasks can be filtered by status', function () {
    $user = User::factory()->create();

    Task::factory()->create(['user_id' => $user->id, 'title' => 'Pending One', 'status' => 'pending']);
    Task::factory()->create(['user_id' => $user->id, 'title' => 'Done One', 'status' => 'completed']);

    // ACT: Filter by status=pending
    $response = $this->actingAs($user)->get('/tasks?status=pending');

    // ASSERT: Only the pending task shows
    $response->assertSeeText('Pending One');
    $response->assertDontSeeText('Done One');
});

test('tasks can be filtered by due today', function () {
    $user = User::factory()->create();

    Task::factory()->create(['user_id' => $user->id, 'title' => 'Due Today', 'due_date' => today()]);
    Task::factory()->create(['user_id' => $user->id, 'title' => 'Due Next Month', 'due_date' => now()->addMonth()]);

    $response = $this->actingAs($user)->get('/tasks?due=today');

    $response->assertSeeText('Due Today');
    $response->assertDontSeeText('Due Next Month');
});

test('tasks can be filtered by overdue', function () {
    $user = User::factory()->create();

    Task::factory()->create(['user_id' => $user->id, 'title' => 'Late Task', 'due_date' => now()->subWeek(), 'status' => 'pending']);
    Task::factory()->create(['user_id' => $user->id, 'title' => 'Future Task', 'due_date' => now()->addWeek()]);

    $response = $this->actingAs($user)->get('/tasks?due=overdue');

    $response->assertSeeText('Late Task');
    $response->assertDontSeeText('Future Task');
});

// ─── CREATE (show form) ─────────────────────────────────────────────

test('user can view the create task form', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/tasks/create');

    $response->assertOk();
});

// ─── STORE (save new task) ──────────────────────────────────────────

test('user can create a task', function () {
    $user = User::factory()->create();

    // ACT: Submit the "create task" form
    $response = $this->actingAs($user)->post('/tasks', [
        'title' => 'Buy groceries',
        'description' => 'Milk, eggs, bread',
        'status' => 'pending',
        'due_date' => '2026-03-01',
    ]);

    // ASSERT: Redirected back to task list
    $response->assertRedirect(route('tasks.index'));

    // ASSERT: The task is in the database, belonging to this user
    $this->assertDatabaseHas('tasks', [
        'title' => 'Buy groceries',
        'user_id' => $user->id,
    ]);
});

test('task title is required', function () {
    $user = User::factory()->create();

    // ACT: Try to create a task with no title
    $response = $this->actingAs($user)->post('/tasks', [
        'title' => '',          // empty!
        'status' => 'pending',
    ]);

    // ASSERT: Validation error on the "title" field
    $response->assertSessionHasErrors('title');
});

test('task status must be valid', function () {
    $user = User::factory()->create();

    // ACT: Try to use an invalid status
    $response = $this->actingAs($user)->post('/tasks', [
        'title' => 'Some Task',
        'status' => 'banana',   // not a valid status!
    ]);

    // ASSERT: Validation error on "status"
    $response->assertSessionHasErrors('status');
});

test('task can be created without optional fields', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/tasks', [
        'title' => 'Minimal task',
        'status' => 'pending',
        // no description, no due_date — both are nullable
    ]);

    $response->assertRedirect(route('tasks.index'));

    $this->assertDatabaseHas('tasks', [
        'title' => 'Minimal task',
        'description' => null,
        'due_date' => null,
    ]);
});

// ─── EDIT (show edit form) ──────────────────────────────────────────

test('user can view the edit form for their task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->get("/tasks/{$task->id}/edit");

    $response->assertOk();
});

test('user cannot edit someone elses task', function () {
    $me = User::factory()->create();
    $other = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $other->id]);

    // ACT: I try to edit someone else's task
    $response = $this->actingAs($me)->get("/tasks/{$task->id}/edit");

    // ASSERT: 403 Forbidden
    $response->assertForbidden();
});

// ─── UPDATE (save changes) ──────────────────────────────────────────

test('user can update their task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create([
        'user_id' => $user->id,
        'title' => 'Old Title',
    ]);

    // ACT: Submit updated data
    $response = $this->actingAs($user)->put("/tasks/{$task->id}", [
        'title' => 'New Title',
        'status' => 'completed',
    ]);

    // ASSERT: Redirect + DB updated
    $response->assertRedirect(route('tasks.index'));

    // refresh() reloads the model from the database
    expect($task->refresh()->title)->toBe('New Title');
    expect($task->status)->toBe('completed');
});

test('user cannot update someone elses task', function () {
    $me = User::factory()->create();
    $other = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $other->id]);

    $response = $this->actingAs($me)->put("/tasks/{$task->id}", [
        'title' => 'Hacked Title',
        'status' => 'pending',
    ]);

    $response->assertForbidden();

    // Make sure the title didn't change
    expect($task->refresh()->title)->not->toBe('Hacked Title');
});

// ─── DESTROY (delete) ───────────────────────────────────────────────

test('user can delete their task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->delete("/tasks/{$task->id}");

    $response->assertRedirect(route('tasks.index'));

    // assertDatabaseMissing = "this row should NOT exist"
    $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
});

test('user cannot delete someone elses task', function () {
    $me = User::factory()->create();
    $other = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $other->id]);

    $response = $this->actingAs($me)->delete("/tasks/{$task->id}");

    $response->assertForbidden();

    // Task should still exist
    $this->assertDatabaseHas('tasks', ['id' => $task->id]);
});
