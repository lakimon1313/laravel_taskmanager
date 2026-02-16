<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Create a user you can log in with
        $you = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),  // login with: test@example.com / password
        ]);

        // Give that user a mix of tasks
        Task::factory()->count(3)->create(['user_id' => $you->id]);  // 3 pending (default)
        Task::factory()->count(2)->inProgress()->create(['user_id' => $you->id]);
        Task::factory()->count(2)->completed()->create(['user_id' => $you->id]);
        Task::factory()->count(2)->overdue()->create(['user_id' => $you->id]);

        // Create a second user with some tasks (to test ownership isolation)
        $other = User::factory()->create([
            'name' => 'Other User',
            'email' => 'other@example.com',
        ]);

        Task::factory()->count(5)->create(['user_id' => $other->id]);
    }
}
