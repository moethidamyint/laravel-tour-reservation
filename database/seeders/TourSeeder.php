<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tour;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 既存データを一旦消去したい場合はコメントアウトを外す
        // Tour::truncate();

        $tours = [
            [
                'title' => '沖縄・離島巡り 贅沢3日間の旅',
                'description' => '透き通る海と豊かな自然を満喫。高級リゾートホテルに宿泊し、シュノーケリングや島の名物料理を楽しめます。',
                'location' => '沖縄県',
                'price' => 88000,
                'duration_days' => 3,
                'image_url' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&auto=format&fit=crop',
            ],
            [
                'title' => '京都・古都の紅葉と伝統文化体験',
                'description' => '歴史ある寺社仏閣を巡り、特別拝観や本格的な精進料理を堪能する大人の落ち着いた散策ツアーです。',
                'location' => '京都府',
                'price' => 45000,
                'duration_days' => 2,
                'image_url' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?w=800&auto=format&fit=crop',
            ],
            [
                'title' => '北海道・大自然トレッキング＆グランピング',
                'description' => '知床の雄大な自然を歩き、夜は満天の星空の下で贅沢なグランピング。地元食材を使ったBBQ付き。',
                'location' => '北海道',
                'price' => 120000,
                'duration_days' => 4,
                'image_url' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=800&auto=format&fit=crop',
            ],
            [
                'title' => '湯布院温泉＆由布岳ドライブ絶景ツアー',
                'description' => '温泉街の散策と名物グルメの食べ歩き。源泉掛け流しの露天風呂付き客室で日々の疲れを癒やします。',
                'location' => '大分県',
                'price' => 62000,
                'duration_days' => 2,
                'image_url' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=800&auto=format&fit=crop',
            ],
            [
                'title' => '富士山を望む本栖湖カヤック体験',
                'description' => '富士五湖の一つ・本栖湖でクリアカヤック体験。富士山の絶景を水上から独り占めするアクティビティツアー。',
                'location' => '山梨県',
                'price' => 28000,
                'duration_days' => 1,
                'image_url' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=800&auto=format&fit=crop',
            ],
        ];

        foreach ($tours as $tour) {
            Tour::create($tour);
        }
    }
}
