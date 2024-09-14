<?php

namespace AuroraWebSoftware\FlyModel;

use AuroraWebSoftware\FlexyField\Contracts\FlexyModelContract;
use AuroraWebSoftware\FlexyField\Traits\Flexy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FlyModel
{
    public function make(string $deck)
    {
        $instance = new class extends Model implements FlexyModelContract
        {
            use Flexy;

            protected $guarded = [];

            protected static function booted()
            {
                self::addGlobalScope('deck', function (Builder $builder) {
                    $modelType = static::getModelType();
                    $builder->where(function ($query) {
                        $query->where('deck', '=', self::$deck);
                    });
                });
            }

            public static string $deck = '';

            protected $table = 'fly_models';

            public static function getModelType(): string
            {
                return 'FlyModel@'.self::$deck;
            }
        };

        $instance::$deck = $deck;
        $instance->deck = $deck;

        return $instance;
    }
}
