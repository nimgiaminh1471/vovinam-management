<?php
namespace App\Filament\Resources\RankResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\RankResource;
use Illuminate\Routing\Router;


class RankApiService extends ApiService
{
    protected static string | null $resource = RankResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
