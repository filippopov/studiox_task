<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use OpenApi\Attributes as OA;

class CategoryController extends Controller
{
    public function __construct(private readonly CategoryService $categoryService)
    {
    }

    /**
     * Display a listing of categories.
     */
    #[OA\Get(
        path: '/api/categories',
        tags: ['Categories'],
        summary: 'List categories with product counts',
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(
                    type: 'array',
                    items: new OA\Items(ref: '#/components/schemas/Category')
                )
            ),
        ]
    )]
    public function index(Request $request): Collection
    {
        return $this->categoryService->index($request);
    }
}
