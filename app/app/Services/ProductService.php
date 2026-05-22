<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    /**
     * @return LengthAwarePaginator<Product>
     */
    public function index(Request $request): LengthAwarePaginator
    {
        $query = Product::query()->with('category');

        $query->when(
            $request->filled('title'),
            fn ($q) => $q->where('title', 'like', '%'.$request->string('title').'%')
        );

        $query->when(
            $request->filled('content'),
            fn ($q) => $q->where('content', 'like', '%'.$request->string('content').'%')
        );

        $query->when(
            $request->filled('min_price'),
            fn ($q) => $q->where('price', '>=', $request->input('min_price'))
        );

        $query->when(
            $request->filled('max_price'),
            fn ($q) => $q->where('price', '<=', $request->input('max_price'))
        );

        $perPage = (int) $request->input('per_page', 15);
        $perPage = $perPage > 0 ? $perPage : 15;

        return $query->paginate($perPage);
    }
}
