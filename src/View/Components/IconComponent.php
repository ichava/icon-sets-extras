<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsExtras\View\Components;

use Simtabi\Laranail\Ichava\IconSetsExtras\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\View\Components\IconComponent as BaseIconComponent;

/**
 * Blade component for the icon-sets-extras pack. Every set keeps its own
 * styling, so no default attributes are added. See README for usage.
 */
class IconComponent extends BaseIconComponent
{
    protected function getIconSet(): string
    {
        return IconsConstants::getPackageName();
    }

    protected function getVendorPackage(): string
    {
        return IconsConstants::getVendorPackage();
    }
}
