# Changelog

All notable changes to `ichava/icon-sets-extras` follow [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) and [Semantic Versioning](https://semver.org/).

## [Unreleased]

### Changed

- **Licence files carry upstream's names, so the first sync of each set rewrites nothing** (icon-sets-sync#88). Game Icons' text is `licenses/game-icons/license.txt`, Zendesk Garden's and Siemens iX's are `LICENSE.md`, and SVG Logos' is `LICENSE.txt`, as their upstreams ship them; they had been renamed to `LICENSE`, which a sync would have written back under the upstream name. The bytes, and so the recorded SHA-256s, are unchanged.
- **Radix Icons records `0.0.17` at `upstream.sets.radix-icons.current_version`**, the `website@0.0.17` archive tag the recipe fetches and stamps, instead of `1.3.2`, the version of `packages/radix-icons` inside that tag (still named in `ref`). With `1.3.2` recorded, the sync would have compared the wrong number with upstream's tags and rewritten the field on its first run.
- **Noto Emoji's full Apache-2.0 text moved to `resources/assets/svg/pack-licenses/noto-emoji/LICENSE-2.0.txt`.** Upstream's `2D/svg/` ships only the short notice (`LICENSE`), so the full text the pack added for Apache-2.0 section 4(a) sat in a directory the sync replaces with upstream's files, and the first sync would have deleted it. `ATTRIBUTION.md` points at the new path.
- **`SetLicenceTest` checks each licence directory's exact file list**, upstream's names, and reads each licence through `license.file` in `config.json`.
- **The upstream sync runs icon-sets-sync `06b17d7`** (icon-sets-sync#88), up from `5fa93a6`, which adds this pack's recipe, the `split-variants` and `exclude` transforms, and the `licence_sha256` pin on the upstream licence text. The `uses:` pin and `toolkit-ref` move together; the reusable workflow's inputs did not change between the two commits, so the caller's `with:` block is untouched.

### Added

- **Initial release.** 43,561 SVGs from 20 sets, one directory per set under `resources/assets/svg/files/`: Radix Icons (318), Feather (287), Boxicons (1,634), IconPark (2,658), MingCute (4,526), TDesign Icons (2,358), Siemens iX Icons (1,490), Zendesk Garden Icons (932), coolicons (2,648), Eva Icons (490), Ant Design Icons (848), Health Icons (1,552), Devicon (2,120), Fluent Emoji (4,740), Pepicons (3,825), Game Icons (4,178), CoreUI Icons Free (562), Pinhead (2,747), SVG Logos (2,068), Noto Emoji (3,580). Each set's licence was read at its pinned version and ships in `resources/assets/svg/licenses/<set>/` under upstream's own file name, with its SHA-256 under `upstream.sets.<set>.license` in `resources/assets/svg/config.json`.
- Every SVG passed `ichava/icon-sets-sync`'s SVG policy (scripts, event handlers, external references and stray text removed). 170 Noto Emoji files that declare Adobe Illustrator entities in an internal DTD cannot be parsed by that policy and are not shipped; they are listed in `config.json`.
- `ATTRIBUTION.md` holds one row per set, the licence texts verbatim, and one row per Game Icons contributor.
- Guards: `IconCountTest` (a count floor per set), `SetLicenceTest` (each licence's hash, the bundle's licence rule, and an attribution row per set), `NoStrayTextNodesTest`, and `SetTest` (one `Set` case per directory).
- **vscode-icons** (tag v13.0.0) is not included. README at v13.0.0: "The icons are licensed under the Creative Commons - ShareAlike (CC BY-SA) license"; only the extension code is MIT. CC-BY-SA is not bundle-eligible.
