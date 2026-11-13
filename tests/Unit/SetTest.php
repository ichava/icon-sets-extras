<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\IconSetsExtras\Enums\Set;

it(description: 'has one case per set directory, and no other', closure: function () {
    $dirs = array_map('basename', glob(dirname(__DIR__, 2) . '/resources/assets/svg/files/*', GLOB_ONLYDIR) ?: []);
    $values = Set::values();
    sort($dirs);
    sort($values);

    expect($values)->toHaveCount(20)
        ->and($values)->toBe($dirs);
});

it(description: 'resolves known values and rejects unknown ones', closure: function () {
    expect(Set::tryFromValue('radix-icons'))->toBe(Set::RADIX_ICONS)
        ->and(Set::tryFromValue('vscode-icons'))->toBeNull();
});
