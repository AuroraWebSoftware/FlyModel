<?php

use AuroraWebSoftware\FlyModel\Facades\FlyModel;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate:fresh');

    $migration = include __DIR__.'/../vendor/aurorawebsoftware/flexyfield/database/migrations/create_flexyfield_table.php';
    $migration->up();

});

it('can test', function () {

    $model = FlyModel::of('deck1');
    $model->save();

    $model->flexy->a = 'a';
    $model->save();

    expect(FlyModel::of('deck1')->find($model->id)->flexy->a)
        ->toBe('a');

});
