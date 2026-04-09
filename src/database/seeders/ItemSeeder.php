<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => '腕時計',
                'image' => 'items/Armani+Mens+Clock.jpg',
                'price' => 15000,
                'brand' => 'Rolax',
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'condition' => '良好',
            ],
            [
                'name' => 'HDD',
                'image' => 'items/HDD+Hard+Disk.jpg',
                'price' => 5000,
                'brand' => '西芝',
                'description' => '高速で信頼性の高いハードディスク',
                'condition' => '目立った傷や汚れなし',
            ],
            [
                'name' => '玉ねぎ3束',
                'image' => 'items/iLoveIMG+d.jpg',
                'price' => 300,
                'brand' => null,
                'description' => '新鮮な玉ねぎ3束のセット',
                'condition' => 'やや傷や汚れあり',
            ],
            [
                'name' => '革靴',
                'image' => 'items/Leather+Shoes+Product+Photo.jpg',
                'price' => 4000,
                'brand' => null,
                'description' => 'クラシックなデザインの革靴',
                'condition' => '状態が悪い',
            ],
            [
                'name' => 'ノートPC',
                'image' => 'items/Living+Room+Laptop.jpg',
                'price' => 45000,
                'brand' => null,
                'description' => '高性能なノートパソコン',
                'condition' => '良好',
            ],
            [
                'name' => 'マイク',
                'image' => 'items/Music+Mic+4632231.jpg',
                'price' => 8000,
                'brand' => 'なし',
                'description' => '高音質のレコーディング用マイク',
                'condition' => '目立った傷や汚れなし',
            ],
            [
                'name' => 'ショルダーバッグ',
                'image' => 'items/Purse+fashion+pocket.jpg',
                'price' => 3500,
                'brand' => null,
                'description' => 'おしゃれなショルダーバッグ',
                'condition' => 'やや傷や汚れあり',
            ],
            [
                'name' => 'タンブラー',
                'image' => 'items/Tumbler+souvenir.jpg',
                'price' => 500,
                'brand' => 'なし',
                'description' => '使いやすいタンブラー',
                'condition' => '状態が悪い',
            ],
            [
                'name' => 'コーヒーミル',
                'image' => 'items/Waitress+with+Coffee+Grinder.jpg',
                'price' => 4000,
                'brand' => 'Starbacks',
                'description' => '手動のコーヒーミル',
                'condition' => '良好',
            ],
            [
                'name' => 'メイクセット',
                'image' => 'items/外出メイクアップセット.jpg',
                'price' => 2500,
                'brand' => null,
                'description' => '便利なメイクアップセット',
                'condition' => '目立った傷や汚れなし',
            ],
        ];

        foreach ($items as $item) {
            Item::create([
                'user_id' => 1,
                'name' => $item['name'],
                'image' => $item['image'],
                'price' => $item['price'],
                'brand' => $item['brand'],
                'description' => $item['description'],
                'condition' => $item['condition'],
            ]);
        }
    }
}
