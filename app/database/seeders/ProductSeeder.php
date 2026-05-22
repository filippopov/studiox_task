<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Product::query()->count() > 0) {
            return;
        }

        if (Category::query()->count() === 0) {
            Category::factory()->count(20)->create();
        }

        $categoryIds = Category::query()->pluck('id');

        Product::factory()
            ->count(200)
            ->state(fn () => ['category_id' => $categoryIds->random()])
            ->create();
    }
}
