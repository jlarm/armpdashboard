<?php

declare(strict_types=1);

use App\Models\Dealership;
use App\Models\Store;
use App\Models\User;

test('to array', function (): void {
    $dealership = Dealership::factory()->create()->refresh();

    expect(array_keys($dealership->toArray()))
        ->toBe([
            'id',
            'uuid',
            'name',
            'slug',
            'type',
            'created_at',
            'updated_at',
            'deleted_at',
        ]);
});

test('dealership can have many users', function (): void {
    $consultants = User::factory(3)->create();
    $dealership = Dealership::factory()->create();

    $dealership->consultants()->attach($consultants);
});

test('dealership can attach a consultant', function (): void {
    $consultant = User::factory()->create();
    $dealership = Dealership::factory()->create();

    $dealership->consultants()->attach($consultant);

    expect($dealership->consultants()->pluck('users.id'))->toContain($consultant->id);
});

test('dealership can detach a consultant', function (): void {
    $consultant = User::factory()->create();
    $dealership = Dealership::factory()->create();

    $dealership->consultants()->attach($consultant);
    $dealership->consultants()->detach($consultant);

    expect($dealership->consultants)->toHaveCount(0);
});

test('dealership can have many stores', function (): void {
    $dealership = Dealership::factory()->create();
    $dealership->stores()->saveMany(Store::factory(3)->make());

    expect($dealership->stores)->toHaveCount(3);
});
