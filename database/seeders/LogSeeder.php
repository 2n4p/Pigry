<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Log;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //全てのユーザーを取得
        $users = User::all();

        //各ユーザーに35件ずつ投稿を作成
        foreach($users as $user) {
            Log::factory()->count(35)->create(['user_id' => $user->id]);
        }
    }
}
