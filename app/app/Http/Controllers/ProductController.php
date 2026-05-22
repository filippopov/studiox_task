<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService)
    {
    }

    /**
     * Display a listing of products.
     */
    public function index(Request $request): LengthAwarePaginator
    {
        return $this->productService->index($request);
    }
}
