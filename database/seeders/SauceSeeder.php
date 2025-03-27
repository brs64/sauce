<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SauceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sauces')->insert([
            [
                'userId' => 1,
                'name' => 'Spicy Mango',
                'manufacturer' => 'Tropical Heat',
                'description' => 'A sweet and spicy mango sauce.',
                'mainPepper' => 'Habanero',
                'imageUrl' => 'https://www.sauce-piquante.fr/77-large_default/marie-sharps-sauce-mango-habanero.jpg',
                'heat' => 7,
                'likes' => 10,
                'dislikes' => 2,
                'usersLiked' => json_encode([1, 2, 3]),
                'usersDisliked' => json_encode([4]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userId' => 2,
                'name' => 'Garlic Inferno',
                'manufacturer' => 'Hot & Spicy Co.',
                'description' => 'A fiery garlic sauce for spice lovers.',
                'mainPepper' => 'Ghost Pepper',
                'imageUrl' => 'https://hellfirehotsauce.com/cdn/shop/products/InfieronoRed-new_1024x1024.jpg?v=1681856765',
                'heat' => 9,
                'likes' => 25,
                'dislikes' => 5,
                'usersLiked' => json_encode([2, 3, 5]),
                'usersDisliked' => json_encode([1]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
