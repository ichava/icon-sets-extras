<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Ichava Extras -- localisable strings
|--------------------------------------------------------------------------
|
| An overlay, not a second source of truth. `name` and `description` are
| deliberately absent: IconRegistry::fromDirectory() reads those from
| resources/assets/svg/config.json, which is canonical.
|
| Set keys match Simtabi\Laranail\Ichava\IconSetsExtras\Enums\Set.
|
*/

return [
    'sets' => [
        'radix-icons'  => 'Radix Icons',
        'feather'      => 'Feather',
        'boxicons'     => 'Boxicons',
        'iconpark'     => 'IconPark',
        'mingcute'     => 'MingCute',
        'tdesign'      => 'TDesign Icons',
        'siemens-ix'   => 'Siemens iX Icons',
        'garden'       => 'Zendesk Garden Icons',
        'coolicons'    => 'coolicons',
        'eva'          => 'Eva Icons',
        'ant-design'   => 'Ant Design Icons',
        'health-icons' => 'Health Icons',
        'devicon'      => 'Devicon',
        'fluent-emoji' => 'Fluent Emoji',
        'pepicons'     => 'Pepicons',
        'game-icons'   => 'Game Icons',
        'coreui'       => 'CoreUI Icons Free',
        'pinhead'      => 'Pinhead',
        'svg-logos'    => 'SVG Logos',
        'noto-emoji'   => 'Noto Emoji',
    ],

    'set_descriptions' => [
        'radix-icons'  => 'Radix Icons by WorkOS (Radix), MIT',
        'feather'      => 'Feather by Cole Bemis, MIT',
        'boxicons'     => 'Boxicons by Aniket Suvarna (Atisa), MIT',
        'iconpark'     => 'IconPark by ByteDance, Apache-2.0',
        'mingcute'     => 'MingCute by MingCute Design, Apache-2.0',
        'tdesign'      => 'TDesign Icons by TDesign (Tencent), MIT',
        'siemens-ix'   => 'Siemens iX Icons by Siemens AG, MIT',
        'garden'       => 'Zendesk Garden Icons by Zendesk, Apache-2.0',
        'coolicons'    => 'coolicons by Kryston Schwarze, MIT',
        'eva'          => 'Eva Icons by Akveo, MIT',
        'ant-design'   => 'Ant Design Icons by Ant UED, MIT',
        'health-icons' => 'Health Icons by Resolve to Save Lives and the Health Icons contributors, CC0-1.0',
        'devicon'      => 'Devicon by konpa and the Devicon contributors, MIT',
        'fluent-emoji' => 'Fluent Emoji by Microsoft Corporation, MIT',
        'pepicons'     => 'Pepicons by CyCraft, CC BY 4.0',
        'game-icons'   => 'Game Icons by Lorc, Delapouite and the game-icons.net contributors, CC BY 3.0 (CC0 for two contributors)',
        'coreui'       => 'CoreUI Icons Free by CoreUI (creativeLabs), CC BY 4.0',
        'pinhead'      => 'Pinhead by Wayside Mapping and the Pinhead contributors, CC0-1.0',
        'svg-logos'    => 'SVG Logos by Gil Barbara, CC0-1.0',
        'noto-emoji'   => 'Noto Emoji by Google, Apache-2.0',
    ],
];
