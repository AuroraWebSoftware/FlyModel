<?php

namespace AuroraWebSoftware\FlyModel;

use AuroraWebSoftware\FlexyField\Contracts\FlexyModelContract;
use AuroraWebSoftware\FlexyField\Traits\Flexy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FlyModel
{
    public function of(string $deck): Model|FlexyModelContract
    {
        $instance = new class extends Model implements FlexyModelContract
        {
            use Flexy;

            protected $guarded = [];

            protected static function booted(): void
            {
                self::addGlobalScope('deck', function (Builder $builder) {
                    $builder->where(function ($query) {
                        $query->where('deck', '=', self::$deck);
                    });
                });
            }

            public static string $deck = '';

            protected $table = 'fly_models';

            public static function getModelType(): string
            {
                return 'AuroraWebSoftware\FlyModel\FlyModel@'.self::$deck;
            }
        };

        $instance::$deck = $deck;
        $instance->deck = $deck;

        return $instance;
    }
}
