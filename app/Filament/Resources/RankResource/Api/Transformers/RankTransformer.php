<?php
namespace App\Filament\Resources\RankResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Rank;

/**
 * @property Rank $resource
 */
class RankTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = $this->resource->toArray();
        
        // Add image URL if exists
        if ($this->resource->hasMedia('images')) {
            $data['image_url'] = $this->resource->getFirstMediaUrl('images');
        }
        
        return $data;
    }
}
