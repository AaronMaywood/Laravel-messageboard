<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name' => "あや",
                'description' => "みんな、今日もお疲れ様！😊🎉",
            ],
            [
                'name' => "たくみ",
                'description' => "バグが見つからない…助けて…🐛🔍",
            ],
            [
                'name' => "なおき",
                'description' => "今週末、どこか出かけたいな～🌍",
            ],
            [
                'name' => "たかし",
                'description' => "今日は天気がいいですね！☀️",
            ],
            [
                'name' => "さくら",
                'description' => "お昼ごはん、何食べようかな…🍚",
            ],
            [
                'name' => "エリカ",
                'description' => "コーヒー飲みすぎて眠れない…☕😅",
            ],
            [
                'name' => "しんじ",
                'description' => "新しいプロジェクトのアイデアが浮かんだ！💡",
            ],
            [
                'name' => "まりこ",
                'description' => "最近読んだ本がめちゃくちゃ面白かった！📖",
            ],
            [
                'name' => "ユウキ",
                'description' => "Laravel、少しずつ理解できてきた！🚀",
            ],
            [
                'name' => "ケンタ",
                'description' => "プログラミング楽しい！💻✨",
            ],
            [
                'name' => "たくみ",
                'description' => "ページネーションは実装されているのでしょうか？",
            ],
            [
                'name' => "あや",
                'description' => "改行も扱えるかな？
                テストしてみよう。",
            ],
        ];

        foreach ($messages as $message)
        {
            DB::table('messages')->insert([
                'name' => $message['name'],
                'description' => $message['description'],
            ]);
        }
    }
}