<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\DealershipType;
use Carbon\CarbonInterface;
use Database\Factories\DealershipFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * @property-read int $id
 * @property-read string $uuid
 * @property-read string $name
 * @property-read DealershipType $type
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 * @property-read CarbonInterface $deleted_at
 */
final class Dealership extends Model
{
    /** @use HasFactory<DealershipFactory> */
    use HasFactory, HasRelationships, SoftDeletes;

    /**
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'id' => 'integer',
            'uuid' => 'string',
            'name' => 'string',
            'type' => DealershipType::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * @return BelongsToMany<User, $this>
     */
    public function consultants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'dealership_user');
    }

    /**
     * @return HasMany<Store, $this>
     */
    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }

    /**
     * @return HasManyDeep<User, $this>
     */
    public function employees(): HasManyDeep
    {
        return $this->hasManyDeep(
            User::class,
            [Store::class, 'store_user'],
            ['dealership_id', 'store_id', 'id'],
            ['id', 'id', 'user_id']
        )->distinct();
    }
}
