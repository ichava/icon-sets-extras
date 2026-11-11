<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\Services\IconRegistry;
use Simtabi\Laranail\Ichava\IconSetsExtras\Enums\Set;
use Simtabi\Laranail\Ichava\IconSetsExtras\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\IconSetsExtras\Providers\IconsServiceProvider;

it(description: 'boots the provider without error', closure: function () {
    expect(array_keys($this->app->getLoadedProviders()))->toContain(IconsServiceProvider::class);
});

it(description: 'resolves constants from config json', closure: function () {
    expect(IconsConstants::getVendorPackage())->toBe('ichava/icon-sets-extras')
        ->and(IconsConstants::getTitle())->toBe('Ichava Extras')
        ->and(IconsConstants::getPrefix())->toBe('extras');
});

it(description: 'uses the config prefix in enum class helpers', closure: function () {
    expect(Set::RADIX_ICONS->getClass())->toBe('extras-radix-icons')
        ->and(Set::FEATHER->getClass())->toBe('extras-feather');
});

it(description: 'falls back to the first set as the default', closure: function () {
    expect(Set::default())->toBe(Set::RADIX_ICONS)
        ->and(Set::FEATHER->isDefault())->toBeFalse();
});

it(description: 'picks up the package in the icon registry', closure: function () {
    expect($this->app->make(IconRegistry::class)->isRegistered('ichava/icon-sets-extras'))->toBeTrue();
});
