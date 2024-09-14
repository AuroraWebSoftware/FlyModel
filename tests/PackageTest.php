<?php

use AuroraWebSoftware\FlexyField\Contracts\FlexyModelContract;
use AuroraWebSoftware\FlexyField\Traits\Flexy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

beforeEach(function () {

    Artisan::call('migrate:fresh');

});

it('can test', function () {
    expect(true)->toBeTrue();

    $instance = new class extends Model implements FlexyModelContract
    {
        use Flexy;

        protected $table = 'fly_models';
    };

    dd($instance::class);

});
