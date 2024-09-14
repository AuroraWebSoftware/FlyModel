<?php

namespace AuroraWebSoftware\FlyModel;

use AuroraWebSoftware\FlexyField\Contracts\FlexyModelContract;
use AuroraWebSoftware\FlexyField\Traits\Flexy;
use Illuminate\Database\Eloquent\Model;

class FlyModel
{
    public function make(string $deck): Model|FlexyModelContract
    {
        $instance = new class extends Model implements FlexyModelContract
        {
            use Flexy;

            public function scopeDeck($query, $value)
            {
                return $query->where('active', $value);
            }

            protected $table = 'fly_models';
        };

        return $instance->deck($deck);
    }
}
