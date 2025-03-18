<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin User */
class UserResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id'                         => $this->id,
            'name'                       => $this->name,
            'email'                      => $this->email,
            'email_verified_at'          => $this->email_verified_at,
            //'password'                   => $this->password,
            //'remember_token'             => $this->remember_token,
            'created_at'                 => $this->created_at,
            'updated_at'                 => $this->updated_at,
            //'notifications_count'        => $this->notifications_count,
            //'read_notifications_count'   => $this->read_notifications_count,
            //'unread_notifications_count' => $this->unread_notifications_count,
            'is_admin'                   => $this->is_admin,

            'guest_book_entries_count' => $this->guest_book_entries_count,
            'guest_book_entries' => GuestBookEntryResource::collection($this->whenLoaded('guestBookEntries')),
        ];
    }
}
