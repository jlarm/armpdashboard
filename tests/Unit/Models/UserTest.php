<?php

declare(strict_types=1);

use App\Models\Dealership;
use App\Models\Store;
use App\Models\User;

test('to array', function (): void {
    $user = User::factory()->create()->refresh();

    expect(array_keys($user->toArray()))
        ->toBe([
            'id',
            'name',
            'email',
            'email_verified_at',
            'role',
            'created_at',
            'updated_at',
            'deleted_at',
        ]);
});

test('user can have many dealerships', function (): void {
    $user = User::factory()->create();
    $dealerships = Dealership::factory(3)->create();

    $user->dealerships()->attach($dealerships);

    expect($user->dealerships)->toHaveCount(3)
        ->and($user->dealerships->first())->toBeInstanceOf(Dealership::class);
});

test('user can attach a dealership', function (): void {
    $user = User::factory()->create();
    $dealership = Dealership::factory()->create();

    $user->dealerships()->attach($dealership);

    expect($user->dealerships()->pluck('dealerships.id'))->toContain($dealership->id);
});

test('user can detach a dealership', function (): void {
    $user = User::factory()->create();
    $dealership = Dealership::factory()->create();

    $user->dealerships()->attach($dealership);
    $user->dealerships()->detach($dealership);

    expect($user->dealerships)->toHaveCount(0);
});

test('user can have many stores', function (): void {
    $user = User::factory()->create();
    $stores = Store::factory(3)->create();

    $user->stores()->attach($stores);

    expect($user->stores)->toHaveCount(3);
});
