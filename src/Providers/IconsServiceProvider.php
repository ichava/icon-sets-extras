<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsExtras\Providers;

use Simtabi\Laranail\Ichava\Providers\IconPackServiceProvider;
use Simtabi\Laranail\Ichava\IconSetsExtras\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\IconSetsExtras\View\Components\IconComponent;

/**
 * Registers the Ichava Extras sets with the Ichava registry on boot.
 */
class IconsServiceProvider extends IconPackServiceProvider
{
    protected function constantsClass(): string
    {
        return IconsConstants::class;
    }

    protected function componentClass(): string
    {
        return IconComponent::class;
    }
}
