<?php

namespace App\Docs\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Product',
    type: 'object',
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'category_id', type: 'integer', example: 1),
        new OA\Property(property: 'price', type: 'number', format: 'float', example: 99.99),
        new OA\Property(property: 'title', type: 'string', example: 'Ergonomic Chair'),
        new OA\Property(property: 'content', type: 'string', example: 'Comfortable chair with lumbar support.'),
        new OA\Property(property: 'image', type: 'string', example: 'https://example.com/images/chair.png'),
        new OA\Property(property: 'category', ref: '#/components/schemas/Category'),
    ]
)]
final class ProductSchema
{
}
