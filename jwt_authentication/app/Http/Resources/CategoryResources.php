<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'primary_key' => $this->id,
            'title' => ucfirst($this->name),
            'status' => true === false ? 'Active' : 'In Active',
            'createdTime' => $this->created_at->diffForHumans(),
            // 'posts' => PostCollections($this->id)
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'success' => true,
                'message' => 'Anything!!'
            ],
        ];
    }
}
