<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Курс для косметологов',
                'slug'  => 'kurs-dlya-cosmetology'
            ],
            [
                'title' => 'Курсы маникюра и педикюра',
                'slug'  => 'kursy-manikura-i-pedikura'
            ],
            [
                'title' => 'Курсы наращивания ресниц',
                'slug'  => 'kurs-dlya-cosmetology'
            ],
            [
                'title' => 'Курс для косметологов',
                'slug'  => 'kurs-dlya-cosmetology'
            ],
            [
                'title' => 'Курс для косметологов',
                'slug'  => 'kurs-dlya-cosmetology'
            ],
            [
                'title' => 'Курс для косметологов',
                'slug'  => 'kurs-dlya-cosmetology'
            ],
        ];
        
        foreach ($categories as $category)
        {
            Category::create($category);
        }
    }
}