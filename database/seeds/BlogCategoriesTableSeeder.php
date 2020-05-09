<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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

        for ($i = 1; $i <= 10; $i++) {
            $categoryName = 'Категория №' . $i;
            $parentId = 0;
            if ($i>4) {
                $parentId = mt_rand(1, 4);
            }
            else {
                $parentId = 1;
            }

            $categories[] = [
                'title'     => $categoryName,
                'alias'     => str_slug($categoryName),
                'parent_id' => $parentId,
            ];
        }

        DB::table('blog_categories')->insert($categories);
    }
}
