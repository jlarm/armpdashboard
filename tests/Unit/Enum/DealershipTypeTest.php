<?php

declare(strict_types=1);

use App\Enums\DealershipType;

test('label returns correct label for each type', function (DealershipType $type, string $expectedLabel): void {
    expect($type->label())->toBe($expectedLabel);
})->with([
    [DealershipType::INDEPENDENT, 'Independent'],
    [DealershipType::GROUP, 'Group'],
]);
