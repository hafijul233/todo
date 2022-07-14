<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class TodoResource extends JsonResource
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'task' => $this->task,
            'completed' => (bool)($this->completed_at != null),
            'completed_at' => (($this->completed_at != null)
                ? $this->completed_at->diffForHumans()
                : null),
/*            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,*/
        ];
    }
}
