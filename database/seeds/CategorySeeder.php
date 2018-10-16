<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
          'name'=> 'Laravel',
          'slug'=> str_slug('laravel')
        ]);

        Category::create([
          'name'=> 'Codeigniter',
          'slug'=> str_slug('codeigniter')
        ]);

        Category::create([
          'name'=> 'No Framework',
          'slug'=> str_slug('no-framework')
        ]);
    }
}
