# Architecture

*Explanation.* What this pack is, what it delegates, and why it is shaped that way.

## What it ships

43,561 SVGs from 20 sets, addressed by set -- see [Sets](sets.md). Counted from
the tracked files rather than quoted from prose:

```bash
git ls-tree -r --name-only origin/main -- resources/assets/svg/files | grep -c '\.svg$'
```

Besides the assets it ships a provider, a constants class, a `Set` enum for its addressing axis, and a
Blade component extending core's. That is the whole surface.

## It depends on core, and core does not depend on it

The pack registers its icon directory with core's `IconRegistry` during `bootingPackage()`, after
core's singletons are bound. Registering earlier -- in `registeringPackage()` -- reaches for services
that do not exist yet, and logging there raises `Log [ichava] not defined`.

Core discovers installed packs at runtime. It has no list of them, so a pack is added by installing
it and removed by removing it.

## It requires `ichava/core` only

`composer.json` requires `php` and `ichava/core`, and nothing under `src/` names a class from any
other `Simtabi\Laranail` namespace. The provider extends core's `IconPackServiceProvider` and declares
its constants class and its component class; core writes the `laranail/package-tools` signature, so
the `laranail/*` packages reach this pack only through core. The composer `type` is
`ichava-icon-set`, which is how core's pack discovery finds it. `tests/Unit/CoreOnlyDependencyTest.php`
fails if any of that changes.

## Why one bundle

Most sets have their own pack, because most apps want one set and a big set is heavy. The sets here
are the tail: smaller, stable, and same-shaped, so a repository each would cost more to maintain than
they weigh. They share one `ATTRIBUTION.md` table and one directory each, so a set can still be
pinned, refreshed or removed on its own.

## How a set gets in

Its LICENSE is read at the version being pinned and must be MIT, Apache-2.0, ISC, CC0 or CC BY. The
text ships beside the icons in `resources/assets/svg/licenses/<set>/`, under the file name upstream
gives it, and its SHA-256 is recorded in `config.json` and in `SetLicenceTest`, so a licence that changes upstream fails the suite instead of shipping. Every SVG
then passes icon-sets-sync's SVG policy; a file the policy cannot parse is left out.

## Upstream

Each set's upstream, pinned version and licence are under `upstream.sets.<set>` in
`resources/assets/svg/config.json`, rather than written out here, so the two cannot drift.

## See also

- [Core architecture](https://github.com/ichava/core/blob/main/docs/architecture.md) -- topology, boot order, the registry
- [Attribution](attribution.md) -- the sets and their licences
- [Release](release.md)

---

[← Docs index](../README.md#documentation)
