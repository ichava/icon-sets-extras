# Attribution and licence

*Reference.*

## One pack, 20 owners

Each set belongs to its authors and keeps its own licence. [`ATTRIBUTION.md`](../ATTRIBUTION.md)
at the package root has a row per set with the author, the pinned version, the licence, the
licence text verbatim and its SHA-256. It ships in the dist archive (`docs/` does not); keep it with
the icons if you copy them out of the package.

**This package's code** (provider, enum, component, configuration) is © Simtabi LLC, [MIT](../LICENSE).

## Which licences, and why only these

A set is in this pack only if its LICENSE, read at the pinned version, is MIT, Apache-2.0, ISC,
CC0 or CC BY. ShareAlike would bind everything bundled with it, and NonCommercial or custom terms
would make the pack unusable for some of its users, so those sets stay out: vscode-icons was
dropped for its CC BY-SA icons.

## What you owe

- **MIT and Apache-2.0 sets**: keep `ATTRIBUTION.md` and the licence files with the icons.
- **CC0 sets**: nothing.
- **CC BY sets (Pepicons, Game Icons, CoreUI Icons Free)**: a visible credit wherever the icons are shown, with a link to the
  licence. The credit lines are in `ATTRIBUTION.md`, one per set, and one per contributor for Game
  Icons.

## Pepicons and its commercial-use request

All three Pepicons variants in this pack (Pop!, Print and Pencil, the `-pop`, `-print` and
`-pencil` files) are CC BY 4.0: they come from one npm package, `pepicons` 3.1.6, whose `license`
field names CC BY 4.0, under one repository `LICENSE` holding the CC BY 4.0 legal code. Upstream's
root README also asks commercial users to buy a licence through a one-time GitHub sponsorship. That
sentence is not in the licence file or the npm package, and CC BY 4.0 is irrevocable and has no
non-commercial limit, so it is a request, not a condition. `ATTRIBUTION.md` quotes it in full,
with the sources and the date they were read.

## Trademarks

Devicon, SVG Logos and the Boxicons `bxl-` logos depict brands. Their licences cover the drawings, not the marks; a brand's own rules
govern how its logo may be used.

## Updating from upstream

Each set has its own upstream and its own refresh recipe. A refresh that brings a changed licence
fails `SetLicenceTest` until a person reads the new text and records its hash.

---

[← Docs index](../README.md#documentation)
