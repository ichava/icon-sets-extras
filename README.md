# ichava/icon-sets-extras

[![Packagist](https://img.shields.io/packagist/v/ichava/icon-sets-extras)](https://packagist.org/packages/ichava/icon-sets-extras)
[![Tests](https://github.com/ichava/icon-sets-extras/actions/workflows/tests.yml/badge.svg)](https://github.com/ichava/icon-sets-extras/actions/workflows/tests.yml)
[![Static analysis](https://github.com/ichava/icon-sets-extras/actions/workflows/code-quality.yml/badge.svg)](https://github.com/ichava/icon-sets-extras/actions/workflows/code-quality.yml)
[![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

The MIT badge is the package code. The icons keep their own licences, per set, in [ATTRIBUTION.md](ATTRIBUTION.md).

> 20 smaller open-licence icon, logo and emoji sets for the Ichava Laravel icon ecosystem: 44,013 SVGs, one directory per set, each set under its own MIT, Apache-2.0, CC0 or CC BY licence.

Requires [`ichava/core`](https://github.com/ichava/core) `^0.1` on PHP `^8.4.1 || ^8.5` and Laravel `^13`.

## Install

This pack requires [`ichava/core`](https://github.com/ichava/core) and nothing else. Nothing in the Ichava family is on Packagist yet, so the **application's** `composer.json` first names the repositories: core's [installation guide](https://github.com/ichava/core/blob/main/docs/installation.md#1-point-composer-at-the-repositories) holds the one block that lists them, core's dependencies included, and this pack's line in it is `https://github.com/ichava/icon-sets-extras`.

Then require the pack:

```bash
composer require ichava/icon-sets-extras
```

The service provider is discovered automatically. Core's [installation guide](https://github.com/ichava/core/blob/main/docs/installation.md) covers core's own setup.

The pack is large: 44,013 files, about 117 MB of SVG. If you need one set, a set's own pack is lighter where one exists.

## Quick start guide and usage

### Getting started

Seed the pack once after installing it, and again after upgrading it:

```bash
php artisan ichava::ichava-core.database seed --package=ichava/icon-sets-extras
```

The seed is not optional: until it runs the registry holds no rows for this pack and every lookup returns nothing. No configuration is needed.

### Usage

Icons are addressed as `ichava/icon-sets-extras::<set>/<name>`. In Blade, through core's component:

```blade
<x-ichava::icon name="ichava/icon-sets-extras::feather/home" class="w-6 h-6" />
<x-ichava::icon name="ichava/icon-sets-extras::pepicons/airplane-pop" class="w-6 h-6" />
```

Or from PHP, through core's helper:

```blade
{{ ichava('ichava/icon-sets-extras::radix-icons/heart')->class('w-5 h-5 text-red-600') }}
```

See [Getting started](docs/getting-started.md) for the full walkthrough, and the [Documentation](#documentation) index below for everything else.

## <a name="documentation"></a>Documentation

The full documentation lives in this repository, under `docs/`, and is indexed below.

### This pack

- [Installation](docs/installation.md) — requirements, the repositories block, seeding
- [Getting started](docs/getting-started.md) — your first icon from this pack
- [Configuration](docs/configuration.md) — why this pack has no config file, and where its settings live
- [Architecture](docs/architecture.md) — what it ships, why it is one bundle, and how a set gets in
- [Release](docs/release.md) — how a version is cut, and when the core floor moves
- [Sets](docs/sets.md) — the 20 sets, their sizes, styles and licences, and the `Set` enum
- [Customisation](docs/customization.md) — sizing and colour across sets that style themselves differently
- [Attribution](docs/attribution.md) — the per-set licence terms, and what a CC BY set asks of you

### Shared across every pack

- [Use an icon pack](https://github.com/ichava/core/blob/main/docs/recipes/use-an-icon-pack.md) — addressing icons, in Blade and in PHP
- [Seed pack icons](https://github.com/ichava/core/blob/main/docs/recipes/seed-pack-icons.md) — the seeding pipeline and its options
- [Check pack updates](https://github.com/ichava/core/blob/main/docs/recipes/check-pack-updates.md) — the update checker and what its statuses mean
- [Serve icons from a CDN](https://github.com/ichava/core/blob/main/docs/recipes/serve-icons-from-a-cdn.md) — reading CDN templates out of `config.json`

## Contributing & security

See [CONTRIBUTING.md](CONTRIBUTING.md). Report vulnerabilities privately through [security policy](https://github.com/ichava/icon-sets-extras/security/policy) — never in a public issue.

## License

The package code is MIT, © Simtabi LLC. See [LICENSE](LICENSE).

The icons belong to their authors, set by set, and Simtabi LLC claims no authorship of them. Each set keeps its own licence (MIT: Radix Icons, Feather, Boxicons, TDesign Icons, Siemens iX Icons, coolicons, Eva Icons, Ant Design Icons, Devicon, Fluent Emoji; Apache-2.0: IconPark, MingCute, Zendesk Garden Icons, Noto Emoji; CC0-1.0: Health Icons, Pinhead, SVG Logos; CC BY 4.0: Pepicons, CoreUI Icons Free; CC BY 3.0: Game Icons). Every notice, and the credit the CC BY sets (Pepicons, Game Icons, CoreUI Icons Free) require, is in [ATTRIBUTION.md](ATTRIBUTION.md), which ships with the package and must accompany any copy of the icons. Devicon, SVG Logos and the Boxicons `bxl-` logos depict trademarks of their owners.
