<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\DealershipType;
use Carbon\CarbonInterface;
use Database\Factories\DealershipFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read string $uuid
 * @property-read string $name
 * @property-read DealershipType $type
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Dealership extends Model
{
    /** @use HasFactory<DealershipFactory> */
    use HasFactory;

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
        ];
    }
}
