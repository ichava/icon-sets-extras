# Customisation

*How-to guide.*

The sets style themselves differently, so the same class does not do the same thing everywhere.

## Colour

Most line and glyph sets (Radix, Feather, Boxicons, TDesign, Siemens iX, Zendesk Garden, coolicons,
Eva, Ant Design outlined and filled, Health Icons, Pepicons, CoreUI, Pinhead, MingCute, IconPark)
use `currentColor` or a single fill, so a text colour utility colours them:

```blade
<x-ichava::icon name="ichava/icon-sets-extras::feather/heart" class="w-6 h-6 text-red-500" />
```

The colour sets carry their own fills and ignore it: Fluent Emoji, Noto Emoji, SVG Logos, the
Devicon `-original` files and Ant Design `-twotone`. Game Icons are white on a black square.

## Size

Use any width and height utility; every SVG has a `viewBox`. The native grids differ, from 12px
(Zendesk Garden `-12`) to 512px (Game Icons, CoreUI), so a set drawn small can look heavy when scaled
up. [Sets](sets.md) lists each set's grid.

```blade
<x-ichava::icon name="ichava/icon-sets-extras::radix-icons/heart" class="w-4 h-4" />
<x-ichava::icon name="ichava/icon-sets-extras::mingcute/home-2-regular" class="w-6 h-6" />
```

## Setting a default class globally

In `config/ichava/core.php`:

```php
'components' => [
    'enabled'       => true,
    'default_class' => 'w-5 h-5 text-gray-700', // applied to every <x-ichava::icon>
],
```

## Accessibility

Add `aria-label` for icons that carry meaning (no adjacent text label):

```blade
<x-ichava::icon name="ichava/icon-sets-extras::feather/trash" aria-label="Delete" class="w-5 h-5" />
```

## See also

- [Sets](sets.md)
- [Blade components](https://github.com/ichava/core/blob/main/docs/tools/blade-components.md)

---

[← Docs index](../README.md#documentation)
