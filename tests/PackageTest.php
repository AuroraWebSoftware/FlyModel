<?php

use AuroraWebSoftware\FlyModel\Facades\FlyModel;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {
    Artisan::call('migrate:fresh');

    $migration = include __DIR__.'/../vendor/aurorawebsoftware/flexyfield/database/migrations/create_flexyfield_table.php';
    $migration->up();

});

it('can test', function () {

    FlyModel::of('deck1')->save();
    $deck1 = FlyModel::of('deck1')->find(1);

    $deck1->flexy->a = 'a';
    $deck1->save();

    expect(FlyModel::of('deck1')->find($deck1->id)->flexy->a)
        ->toBe('a');

});
