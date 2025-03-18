<?php

namespace App\Http\Resources;

use App\Models\GuestBookEntry;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

/** @mixin GuestBookEntry */
class GuestBookEntryResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id'         => $this->id,
            'body'       => $this->body,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user_id' => $this->user_id,

            'user' => new UserResource($this->whenLoaded('user')),

            'can' => [
                'update_entry' => Auth::check() && Auth::user()->can('update', $this->resource),
                'delete_entry' => Auth::check() && Auth::user()->can('delete', $this->resource),
            ]
        ];
    }
}
