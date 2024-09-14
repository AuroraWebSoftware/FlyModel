<?php

use AuroraWebSoftware\FlexyField\Contracts\FlexyModelContract;
use AuroraWebSoftware\FlexyField\Traits\Flexy;
use AuroraWebSoftware\FlyModel\Facades\FlyModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {

    Artisan::call('migrate:fresh');

    $migration = include __DIR__.'/../vendor/aurorawebsoftware/flexyfield/database/migrations/create_flexyfield_table.php';
    $migration->up();

});

it('can test', function () {

    FlyModel::make('x')->save();
    $xModel = FlyModel::make('x')->find(1);


    $xModel->flexy->a = 'a';
    $xModel->save();

});
