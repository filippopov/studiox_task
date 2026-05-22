<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    /**
     * @return Collection<int, Category>
     */
    public function index(Request $request): Collection
    {
        return Category::query()
            ->withCount('products')
            ->orderBy('title')
            ->get();
    }
}
