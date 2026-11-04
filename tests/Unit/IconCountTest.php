<?php

declare(strict_types=1);

/**
 * Every set holds at least the number of SVGs vendored from its pinned upstream
 * (after the subsets and exclusions ATTRIBUTION.md lists). A refresh that silently
 * drops icons, or a set directory that stops matching, fails here.
 */
function extras_files(): string
{
    return dirname(__DIR__, 2) . '/resources/assets/svg/files';
}

/** @return array<string, int> set => SVG count at its pinned upstream */
function extras_count_floor(): array
{
    return [
        'radix-icons'  => 318,
        'feather'      => 287,
        'boxicons'     => 1634,
        'iconpark'     => 2658,
        'mingcute'     => 4526,
        'tdesign'      => 2358,
        'siemens-ix'   => 1490,
        'garden'       => 932,
        'coolicons'    => 2648,
        'eva'          => 490,
        'ant-design'   => 848,
        'health-icons' => 1552,
        'devicon'      => 2120,
        'fluent-emoji' => 4740,
        'pepicons'     => 3825,
        'game-icons'   => 4178,
        'coreui'       => 562,
        'pinhead'      => 2747,
        'svg-logos'    => 2068,
        'noto-emoji'   => 3580,
    ];
}

it(description: 'ships at least the vendored count in every set', closure: function () {
    expect(extras_count_floor())->toHaveCount(20);

    foreach (extras_count_floor() as $set => $floor) {
        $count = 0;
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(extras_files() . "/{$set}", FilesystemIterator::SKIP_DOTS));
        foreach ($iterator as $file) {
            $count += $file->getExtension() === 'svg' ? 1 : 0;
        }
        expect($count)->toBeGreaterThanOrEqual($floor, "{$set} holds {$count} SVGs, under the floor of {$floor}");
    }
});

it(description: 'ships no set that a licence-ineligible upstream was dropped from', closure: function () {
    expect(is_dir(extras_files() . '/vscode-icons'))->toBeFalse('vscode-icons is CC BY-SA and must not ship');
});
