<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ユーザーを1人作成
        $user = User::factory()->create();

        // 目標体重を1件作成（ユーザーに紐付け）
        WeightTarget::factory()->create([
            'user_id' => $user->id,
        ]);

        // 体重ログを35件作成（ユーザーに紐付け）
        WeightLog::factory()->count(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
