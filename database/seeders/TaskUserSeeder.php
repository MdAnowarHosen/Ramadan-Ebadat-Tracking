<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $users = User::inRandomOrder()->take(30)->get();
          $tasks = Task::inRandomOrder()->take(30)->get();

          foreach ($users as $user) {
              foreach ($tasks as $task) {
                  DB::table('task_user')->insert([
                      'user_id' => $user->id,
                      'task_id' => $task->id,
                      'created_at' => now(),
                      'updated_at' => now(),
                  ]);
              }
          }
    }
}
