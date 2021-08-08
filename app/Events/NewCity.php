<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewCity
{
    use SerializesModels;

    public $city;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($city)
    {
        $this->city = $city;
    }
}
