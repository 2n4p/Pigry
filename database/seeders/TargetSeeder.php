<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Target;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //全てのユーザーを取得
        $users = User::all();

        //各ユーザーに1件の目標体重を作成
        foreach($users as $user) {
            Target::factory()->count(1)->create(['user_id' => $user->id]);
        }
    }
}
