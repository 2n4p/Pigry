<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //テスト用ユーザー
        User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => Hash::make('testuser'),
        ]);

        //一般ユーザーを1名作成
        User::factory()->count(1)->create();
    }
}
