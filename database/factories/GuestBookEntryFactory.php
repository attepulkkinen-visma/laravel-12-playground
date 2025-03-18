<?php

namespace Database\Factories;

use App\Models\GuestBookEntry;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GuestBookEntryFactory extends Factory
{
    protected $model = GuestBookEntry::class;

    public function definition()
    {
        return [
            'body'       => $this->faker->realText(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
