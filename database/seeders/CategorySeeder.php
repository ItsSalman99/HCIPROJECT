<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'name' => 'TV & Home Appliances',
            'slug' => Str::slug('TV & Home Appliances'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Health & Beauty',
            'slug' => Str::slug('Health & Beauty'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Babies & Toys',
            'slug' => Str::slug('Babies & Toys'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Groceries & Pets',
            'slug' => Str::slug('Groceries & Pets'),
            'image' => '',
            'active' => 1,
        ]);
        Category::create([
            'name' => 'Home & Lifestyle',
            'slug' => Str::slug('Home & Lifestyle'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Women’s Fashion',
            'slug' => Str::slug('Women’s Fashion'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Men’s Fashion',
            'slug' => Str::slug('Men’s Fashion'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Watches',
            'slug' => Str::slug('Watches'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Sports & Outdoor',
            'slug' => Str::slug('Sports & Outdoor'),
            'image' => '',
            'active' => 1,
        ]);


        Category::create([
            'name' => 'Automative & Motorbike',
            'slug' => Str::slug('Automative & Motorbike'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Kids',
            'slug' => Str::slug('Kids'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Bags',
            'slug' => Str::slug('Bags'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Jewelery',
            'slug' => Str::slug('Jewelery'),
            'image' => '',
            'active' => 1,
        ]);


        Category::create([
            'name' => 'Lifestyle',
            'slug' => Str::slug('Lifestyle'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Houseware & Furnishings',
            'slug' => Str::slug('Houseware & Furnishings'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Luxury Goods',
            'slug' => Str::slug('Luxury Goods'),
            'image' => '',
            'active' => 1,
        ]);

        Category::create([
            'name' => 'Mass Merchant',
            'slug' => Str::slug('Mass Merchant'),
            'image' => '',
            'active' => 1,
        ]);

    }
}
