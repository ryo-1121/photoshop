<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\MajorCategory;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_categories = MajorCategory::pluck('name', 'id');

        $photo_categories = [
            'Person', 'Animal', 'Food', 'Nature'
        ];

        foreach ($major_categories as $major_category_id => $major_category_name) {
            if ($major_category_name == 'Photo') {
                foreach ($photo_categories as $photo_category) {
                    Category::create([
                        'name' => $photo_category,
                        'description' => $photo_category,
                          'major_category_name' => $major_category_name,
                          'major_category_id' => $major_category_id
                    ]);
                }
            }

        }
    }
}
