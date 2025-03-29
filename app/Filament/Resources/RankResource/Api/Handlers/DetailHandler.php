<?php

namespace App\Filament\Resources\RankResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\RankResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\RankResource\Api\Transformers\RankTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = RankResource::class;

    public static bool $public = true;

    /**
     * Show Rank
     *
     * @param Request $request
     * @return RankTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new RankTransformer($query);
    }
}
