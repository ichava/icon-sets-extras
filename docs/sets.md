# Sets

*Reference.*

`ichava/icon-sets-extras` ships **43,561 SVGs across 20 sets**, one directory each. The `Set` enum in
`src/Enums/Set.php` is the source of truth for the list, and `resources/assets/svg/config.json`
records each set's upstream, pinned version and licence under `upstream.sets`.

| Set | Project | SVGs | Style | Licence |
|---|---|---:|---|---|
| `radix-icons` (default) | Radix Icons | 318 | 15×15, filled | MIT |
| `feather` | Feather | 287 | 24×24, 2px stroke | MIT |
| `boxicons` | Boxicons | 1,634 | 24×24; regular (bx-), solid (bxs-), logos (bxl-) | MIT |
| `iconpark` | IconPark | 2,658 | 48×48 outline, four themes in the source | Apache-2.0 |
| `mingcute` | MingCute | 4,526 | 24×24, regular (line) and filled | Apache-2.0 |
| `tdesign` | TDesign Icons | 2,358 | 24×24 | MIT |
| `siemens-ix` | Siemens iX Icons | 1,490 | mixed sizes | MIT |
| `garden` | Zendesk Garden Icons | 932 | 16×16 and 12×12 | Apache-2.0 |
| `coolicons` | coolicons | 2,648 | 24×24, line and fill (regular corners) | MIT |
| `eva` | Eva Icons | 490 | 24×24, fill and outline | MIT |
| `ant-design` | Ant Design Icons | 848 | 1024×1024, outlined, filled and two-tone | MIT |
| `health-icons` | Health Icons | 1,552 | 48×48, outline and filled | CC0-1.0 |
| `devicon` | Devicon | 2,120 | 128×128 logos; original, plain, line and wordmark | MIT |
| `fluent-emoji` | Fluent Emoji | 4,740 | flat and high-contrast, with skin tones | MIT |
| `pepicons` | Pepicons | 3,825 | 20×20; pop, print and pencil, all three CC BY 4.0 | CC BY 4.0 |
| `game-icons` | Game Icons | 4,178 | 512×512, white on a black square | CC BY 3.0 |
| `coreui` | CoreUI Icons Free | 562 | 512×512 line icons | CC BY 4.0 |
| `pinhead` | Pinhead | 2,747 | 15×15 map icons | CC0-1.0 |
| `svg-logos` | SVG Logos | 2,068 | full-colour brand logos | CC0-1.0 |
| `noto-emoji` | Noto Emoji | 3,580 | colour emoji, 128×128 | Apache-2.0 |

Counts measured with `find resources/assets/svg/files/<set> -name '*.svg' | wc -l`; `IconCountTest`
holds each one as a floor.

## Addressing an icon

The set is the first path segment, then the name:

```blade
<x-ichava::icon name="ichava/icon-sets-extras::feather/home" class="w-6 h-6" />
<x-ichava::icon name="ichava/icon-sets-extras::ant-design/home-outlined" class="w-6 h-6" />
<x-ichava::icon name="ichava/icon-sets-extras::game-icons/lorc/dragon-head" class="w-8 h-8" />
```

Within a set the names are flat. Where upstream has styles, the style is a suffix on the name
(`-outlined`, `-filled`, `-twotone`; `-pop`, `-print`, `-pencil`; `-regular`, `-filled`;
`-line`, `-fill`; `-16`, `-12`; `-outline`, `-filled`). Game Icons is the one set with a second
level: one directory per contributor, because its licence asks for each contributor's credit.

## What was left out

- **Size subsets.** coolicons ships its line and fill styles at regular corners (2,648 of 19,860);
  Fluent Emoji ships Flat and High Contrast and not the 132 MB Color style; Health Icons ships the
  48px drawings and not the 24px redraws; CoreUI ships the free set, not its brand logos or flags.
- **Unverifiable files.** 170 Noto Emoji SVGs declare an internal DTD, which the sanitiser cannot
  parse, so they are not shipped.
- **Licence.** vscode-icons was a planned member; its icons are CC BY-SA, which the bundle refuses.

Each is recorded in `config.json` and in [Attribution](attribution.md).

## Set enum (PHP)

```php
use Simtabi\Laranail\Ichava\IconSetsExtras\Enums\Set;

Set::FEATHER->value;   // 'feather'
Set::default();        // Set::RADIX_ICONS, the first set
```

---

[← Docs index](../README.md#documentation)
