<?php

namespace App\Docs;

use OpenApi\Attributes as OA;

#[OA\Info(title: 'StudioX API', version: '1.0.0')]
#[OA\Server(url: 'http://localhost:8080', description: 'Local')]
#[OA\Tag(name: 'Products')]
#[OA\Tag(name: 'Categories')]
final class OpenApi
{
}
