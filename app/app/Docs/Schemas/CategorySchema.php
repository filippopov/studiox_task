<?php

namespace App\Docs\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Category',
    type: 'object',
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'title', type: 'string', example: 'Office Chairs'),
        new OA\Property(property: 'products_count', type: 'integer', example: 12),
    ]
)]
final class CategorySchema
{
}
