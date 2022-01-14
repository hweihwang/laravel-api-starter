<?php

namespace App\AdminCQRS\Todos\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Support\Helper\Helper;

class GetListTodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'status' => $this->status->name,
            'created_at' => Helper::yearMonthDayHourMinute($this->created_at),
            'updated_at' => Helper::yearMonthDayHourMinute($this->updated_at),
        ];
    }
}
