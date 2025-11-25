<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'name' => 'Joe Lohr',
            'email' => 'jlohr@autorisknow.com',
            'password' => bcrypt('password'),
            'role' => Role::ADMIN,
        ]);
    }
}
