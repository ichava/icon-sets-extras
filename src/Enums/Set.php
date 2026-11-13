<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsExtras\Enums;

use Simtabi\Laranail\Ichava\Traits\HasIconSetVariants;
use Simtabi\Laranail\Ichava\Contracts\IconSetVariantInterface;
use Simtabi\Laranail\Ichava\IconSetsExtras\Constants\IconsConstants;

/**
 * The upstream set an icon comes from.
 *
 * Cases mirror the top-level directories under `resources/assets/svg/files/`
 * and the keys under `metadata.data.categories` in config.json. Each set keeps
 * its own licence; ATTRIBUTION.md has one row per case.
 */
enum Set: string implements IconSetVariantInterface
{
    use HasIconSetVariants;

    case RADIX_ICONS = 'radix-icons';
    case FEATHER = 'feather';
    case BOXICONS = 'boxicons';
    case ICONPARK = 'iconpark';
    case MINGCUTE = 'mingcute';
    case TDESIGN = 'tdesign';
    case SIEMENS_IX = 'siemens-ix';
    case GARDEN = 'garden';
    case COOLICONS = 'coolicons';
    case EVA = 'eva';
    case ANT_DESIGN = 'ant-design';
    case HEALTH_ICONS = 'health-icons';
    case DEVICON = 'devicon';
    case FLUENT_EMOJI = 'fluent-emoji';
    case PEPICONS = 'pepicons';
    case GAME_ICONS = 'game-icons';
    case COREUI = 'coreui';
    case PINHEAD = 'pinhead';
    case SVG_LOGOS = 'svg-logos';
    case NOTO_EMOJI = 'noto-emoji';

    public function getPath(): string
    {
        return IconsConstants::getSvgPath($this->value);
    }

    private static function getDefaultValue(): string
    {
        return IconsConstants::getDefaultCategory() ?? self::RADIX_ICONS->value;
    }

    private static function getClassPrefix(): string
    {
        return IconsConstants::getPrefix();
    }
}
