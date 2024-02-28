<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Lesson as LessonResource;
use App\Http\Resources\Tag as TagResource;

class Lesson extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'User Name' => $this->user->name,
            'Title Lesson' => $this->title,
            'The Body Lesson' => $this->body,
            'Tags Of Lesson' =>  TagResource::collection($this->tags),
        ];
    }
}
