<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{

    private static $list = [
        'Sog`lik uchun',
        'Yangiliklar',
        'Dorilar'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$list as $item)
        {
            Category::create([
                'name' => $item,
                'slug' => str_slug($item, '-')
            ]);
        }
    }
}
