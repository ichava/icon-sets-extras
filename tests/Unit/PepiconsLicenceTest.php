<?php

declare(strict_types=1);

/**
 * Pepicons ships three variants under one CC BY 4.0 grant, while upstream's root
 * README asks commercial users to buy a licence. Read on 2026-11-05: that sentence
 * is in neither the LICENSE file nor the npm package, and CC BY 4.0 is irrevocable
 * with no non-commercial limit, so it is a request beside the licence.
 *
 * This pins the three facts that conclusion rests on: the shipped variants are
 * exactly the three that were read, the licence text is the CC BY 4.0 legal code
 * with no commercial term, and ATTRIBUTION.md states the licence per variant and
 * quotes the request as a request. A fourth variant, a changed text, or an edit
 * that turns the request into a condition fails here until someone re-reads upstream.
 */
function pepicons_root(): string
{
    return dirname(__DIR__, 2);
}

/** @return array<string, int> suffix => files shipped at pepicons 3.1.6 */
function pepicons_variants(): array
{
    return ['pop' => 1275, 'print' => 1275, 'pencil' => 1275];
}

/** The ATTRIBUTION.md section for the set, from its heading to the next set's. */
function pepicons_attribution_section(): string
{
    $text = (string) file_get_contents(pepicons_root() . '/ATTRIBUTION.md');
    preg_match('/^### `pepicons`: Pepicons\n(.*?)(?=^### `)/ms', $text, $m);

    return $m[1] ?? '';
}

it(description: 'ships exactly the pop, print and pencil variants, at their pinned counts', closure: function () {
    $files = glob(pepicons_root() . '/resources/assets/svg/files/pepicons/*.svg') ?: [];
    expect(count($files))->toBe(array_sum(pepicons_variants()));

    $counts = [];
    foreach ($files as $file) {
        $matched = preg_match('/-(pop|print|pencil)\.svg$/', basename($file), $m);
        $this->assertSame(1, $matched, basename($file) . ' is not a pop, print or pencil file; read its licence before shipping it');
        $counts[$m[1]] = ($counts[$m[1]] ?? 0) + 1;
    }
    ksort($counts);
    $expected = pepicons_variants();
    ksort($expected);
    expect($counts)->toBe($expected);
});

it(description: 'ships the CC BY 4.0 legal code with no commercial term', closure: function () {
    $licence = (string) file_get_contents(pepicons_root() . '/resources/assets/svg/licenses/pepicons/LICENSE');
    $flat = (string) preg_replace('/\s+/', ' ', $licence);

    expect(hash('sha256', $licence))->toBe('dbb19cb7bda19afef40f19094a668dfe61375cfd57c49d33c660bdb76676b5c5');
    $this->assertStringStartsWith("Pepicons by © Copyright CyCraft, 2019 - today\n\nAttribution 4.0 International", $licence);
    $this->assertStringContainsString('Creative Commons Attribution 4.0 International Public License', $flat);
    $this->assertStringContainsString('worldwide, royalty-free, non-sublicensable, non-exclusive, irrevocable license', $flat);
    $this->assertStringContainsString('not stated herein are separate from and independent of the terms and conditions of this Public License', $flat);
    $this->assertStringNotContainsStringIgnoringCase('commercial', $licence, 'the licence text now mentions commercial use; re-read upstream before shipping it');
    $this->assertStringNotContainsStringIgnoringCase('purchase', $licence);
    $this->assertStringNotContainsString('github.com/sponsors', $licence);
});

it(description: 'states the licence of each variant in ATTRIBUTION.md', closure: function () {
    $section = pepicons_attribution_section();
    expect($section)->not->toBe('');

    $rows = [
        'pop'    => '| Pop! (`-pop`) | 1,275 | CC BY 4.0 |',
        'print'  => '| Print (`-print`) | 1,275 | CC BY 4.0 |',
        'pencil' => '| Pencil (`-pencil`) | 1,275 | CC BY 4.0 |',
    ];
    expect(array_keys($rows))->toBe(array_keys(pepicons_variants()));
    foreach ($rows as $variant => $row) {
        $this->assertStringContainsString($row, $section, "ATTRIBUTION.md does not state the licence of the {$variant} variant");
    }
});

it(description: 'quotes the commercial-use request verbatim, as a request and not a condition', closure: function () {
    $section = pepicons_attribution_section();

    $this->assertStringContainsString(
        '"For commercial use please purchase a License at: https://github.com/sponsors/mesqueeb?frequency=one-time"',
        $section,
    );
    $this->assertStringContainsString('That sentence is a request beside the licence, not a term of it', $section);
    $this->assertStringContainsString('commercial use of the icons shipped here is licensed under CC BY 4.0', $section);

    $docs = (string) file_get_contents(pepicons_root() . '/docs/attribution.md');
    $this->assertStringContainsString('so it is a request, not a condition', $docs);
});
