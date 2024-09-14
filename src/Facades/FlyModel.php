<?php

namespace AuroraWebSoftware\FlyModel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AuroraWebSoftware\FlyModel\FlyModel
 */
class FlyModel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \AuroraWebSoftware\FlyModel\FlyModel::class;
    }
}
