<?php

declare(strict_types=1);

/**
 * Every set ships the licence text it was vendored under, byte for byte, and
 * names a licence the bundle rule allows: MIT, Apache-2.0, ISC, CC0-1.0 or CC BY.
 * A refresh that brings a changed licence fails here until someone reads it.
 */
function extras_root(): string
{
    return dirname(__DIR__, 2);
}

/** @return array<string, string> set => SHA-256 of its LICENSE, read 2026-11-04 */
function extras_licence_hashes(): array
{
    return [
        'radix-icons'  => '0e80a2d229d2fd4fc7e8636142ec5d0ff0bc031f14c15b682e2ac01dfd5b5138',
        'feather'      => '308028e93fcf84972523cdf6e616f73168546b4953895f516d01287f16fe7bee',
        'boxicons'     => '1676a8bdd036382b7bdb8a9ec26a55af6bf15035dd4d405169da2ee45b066e22',
        'iconpark'     => '81268f00802b1a9cffae4df43f78c3a0809845e03fef3da68f26ad2e4c49681e',
        'mingcute'     => 'cfc7749b96f63bd31c3c42b5c471bf756814053e847c10f3eb003417bc523d30',
        'tdesign'      => 'b3dbcb89dcf4a11abf1b70d043795a3da0c458af16fefd2ff315d9ff5875312f',
        'siemens-ix'   => '42cb46c894aa9267307aa4985f40f44ba669e54d9b6b487960ecd24e1989213b',
        'garden'       => '46ae5f0dc2e06a18cde8b06bdb45abea0b6e28d169e6eff2069536780304cf6e',
        'coolicons'    => '35d8a4a8e1793b261198949d213583904b11e3826be8618ae9b9dbc6b70f50cc',
        'eva'          => '4788c563f8871931bce41ede59379a5277ac1a473e289f9100924149ce8bd311',
        'ant-design'   => '5d367fb0a07340571542eb4ee8eb1add62d37b71bad6786a57c2e9a86bf76c70',
        'health-icons' => 'd36196c6c2b0a983415778adddf81bfe63c51f408e707a36fa2b029d65e92d06',
        'devicon'      => '121194741d4a915b9f5890fdd6dd95121f9b1f816517c792358d72d7c838d664',
        'fluent-emoji' => 'c2cfccb812fe482101a8f04597dfc5a9991a6b2748266c47ac91b6a5aae15383',
        'pepicons'     => 'dbb19cb7bda19afef40f19094a668dfe61375cfd57c49d33c660bdb76676b5c5',
        'game-icons'   => 'fac95252798668fab5ea2cb08338f2ebc6bf894a72b19a15af1ca62f0a6d2e79',
        'coreui'       => '171b668bd4fa31e5b75141d30290e5ab9eefcc881027ef24d0bd9e91aea8689b',
        'pinhead'      => 'a2010f343487d3f7618affe54f789f5487602331c0a8d03f49e9a7c547cf0499',
        'svg-logos'    => '36ffd9dc085d529a7e60e1276d73ae5a030b020313e6c5408593a6ae2af39673',
        'noto-emoji'   => '611ceab36dae96644ca84e8ace6873821790192bf6f73b0d0624a21b24b4b332',
    ];
}

/** @return array<string, mixed> */
function extras_config(): array
{
    return json_decode((string) file_get_contents(extras_root() . '/resources/assets/svg/config.json'), true, flags: JSON_THROW_ON_ERROR);
}

it(description: 'ships each set licence unchanged since it was read', closure: function () {
    expect(extras_licence_hashes())->toHaveCount(20);

    foreach (extras_licence_hashes() as $set => $hash) {
        $file = extras_root() . "/resources/assets/svg/licenses/{$set}/LICENSE";
        expect(is_file($file))->toBeTrue("missing licence for {$set}");
        expect(hash_file('sha256', $file))->toBe($hash, "the {$set} licence changed; read it before shipping");
        expect(extras_config()['upstream']['sets'][$set]['license']['sha256'])->toBe($hash);
    }
});

it(description: 'names only bundle-eligible licences', closure: function () {
    $allowed = ['MIT', 'Apache-2.0', 'ISC', 'CC0-1.0', 'CC-BY-3.0', 'CC-BY-4.0'];
    $sets = extras_config()['upstream']['sets'];
    expect($sets)->toHaveCount(20);

    foreach ($sets as $set => $entry) {
        expect(in_array($entry['license']['spdx'], $allowed, true))->toBeTrue("{$set} is {$entry['license']['spdx']}, which the bundle does not allow");
        expect($entry['license']['spdx'])->not->toContain('SA');
    }
});

it(description: 'credits every set in ATTRIBUTION.md, with author and licence for the CC BY ones', closure: function () {
    $text = (string) file_get_contents(extras_root() . '/ATTRIBUTION.md');

    foreach (extras_config()['upstream']['sets'] as $set => $entry) {
        expect(str_contains($text, "`{$set}`"))->toBeTrue("ATTRIBUTION.md has no row for {$set}");
        if ($entry['attribution_required']) {
            expect(str_contains($text, $entry['owner']))->toBeTrue("ATTRIBUTION.md does not name the author of {$set}");
        }
    }
});
