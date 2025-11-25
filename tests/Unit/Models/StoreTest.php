<?php

declare(strict_types=1);

use App\Models\Dealership;
use App\Models\Store;
use App\Models\User;

test('to array', function (): void {
    $store = Store::factory()->create()->refresh();

    expect(array_keys($store->toArray()))
        ->toBe([
            'id',
            'uuid',
            'dealership_id',
            'name',
            'slug',
            'address',
            'city',
            'state',
            'zip',
            'phone',
            'timezone',
            'created_at',
            'updated_at',
            'deleted_at',
        ]);
});

test('store belongs to dealership', function (): void {
    $dealership = Dealership::factory()->create();
    $store = Store::factory()->create(['dealership_id' => $dealership->id]);

    expect($store->dealership->id)->toBe($dealership->id);
});

test('store can have many employees', function (): void {
    $store = Store::factory()->create();
    $employees = User::factory(3)->create();

    $store->employees()->attach($employees);

    expect($store->employees)->toHaveCount(3);
});
