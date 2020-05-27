<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [];

        $categoryName = 'Без категории';
        $categories[] = [
            'title'     => $categoryName,
            'alias'     => str_slug($categoryName),
            'parent_id' => 0,
        ];

        for ($i = 2; $i <= 11; $i++) {
            $categoryName = 'Категория №' . $i;
            $parent_id = ($i > 5) ? random_int(1, 5) : 1;

            $categories[] = [
                'title'     => $categoryName,
                'alias'     => str_slug($categoryName),
                'parent_id' => $parent_id,
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
