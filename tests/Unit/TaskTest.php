<?php

/*
|--------------------------------------------------------------------------
| UNIT TESTS — Task Model
|--------------------------------------------------------------------------
|
| Unit tests are for testing small pieces of logic in isolation.
| Here we test the model's scopes and relationships.
|
| Notice: These use "pest()->extend(...)->in('Feature')" in Pest.php,
| but Unit tests do NOT get RefreshDatabase by default.
| We add "uses()" at the top to opt-in.
|
*/

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

// Bind to TestCase so we get the full Laravel app + RefreshDatabase for clean DB
uses(Tests\TestCase::class, RefreshDatabase::class);

// ─── RELATIONSHIPS ──────────────────────────────────────────────────

test('task belongs to a user', function () {
    // ARRANGE: Create a task (the factory auto-creates a user)
    $task = Task::factory()->create();

    // ASSERT: The relationship works and returns a User instance
    expect($task->user)->toBeInstanceOf(User::class);
});

test('user has many tasks', function () {
    $user = User::factory()->create();
    Task::factory()->count(3)->create(['user_id' => $user->id]);

    expect($user->tasks)->toHaveCount(3);
});

// ─── SCOPES ─────────────────────────────────────────────────────────

test('status scope filters tasks by status', function () {
    $user = User::factory()->create();

    Task::factory()->count(2)->create(['user_id' => $user->id, 'status' => 'pending']);
    Task::factory()->count(3)->create(['user_id' => $user->id, 'status' => 'completed']);

    // The scope: Task::status('pending') adds a WHERE clause
    $pending = Task::status('pending')->get();
    $completed = Task::status('completed')->get();

    expect($pending)->toHaveCount(2);
    expect($completed)->toHaveCount(3);
});

test('overdue scope returns only incomplete tasks past due date', function () {
    $user = User::factory()->create();

    // This one IS overdue (past due + not completed)
    Task::factory()->create([
        'user_id' => $user->id,
        'due_date' => now()->subDays(5),
        'status' => 'pending',
    ]);

    // This one is past due BUT completed — should NOT be "overdue"
    Task::factory()->create([
        'user_id' => $user->id,
        'due_date' => now()->subDays(5),
        'status' => 'completed',
    ]);

    // This one is NOT past due
    Task::factory()->create([
        'user_id' => $user->id,
        'due_date' => now()->addWeek(),
        'status' => 'pending',
    ]);

    $overdue = Task::overdue()->get();

    // Only 1 task should match: past due + not completed
    expect($overdue)->toHaveCount(1);
    expect($overdue->first()->status)->toBe('pending');
});
