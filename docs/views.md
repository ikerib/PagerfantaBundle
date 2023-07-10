# Available Views

## Default Views

All of the views provided in the `pagerfanta/core` package are available by default for use with this bundle.

The below table lists the view names and the corresponding class. 

| View Name            | Class Name                              |
| -------------------- | --------------------------------------- |
| `default`            | `Pagerfanta\View\DefaultView`           |
| `foundation6`        | `Pagerfanta\View\Foundation6View`       |
| `semantic_ui`        | `Pagerfanta\View\SemanticUiView`        |
| `twitter_bootstrap`  | `Pagerfanta\View\TwitterBootstrapView`  |
| `twitter_bootstrap3` | `Pagerfanta\View\TwitterBootstrap3View` |
| `twitter_bootstrap4` | `Pagerfanta\View\TwitterBootstrap4View` |
| `twitter_bootstrap5` | `Pagerfanta\View\TwitterBootstrap5View` |

## Twig View

This bundle provides a Pagerfanta view which renders a Twig template.

The below table lists the available templates and the CSS framework they correspond to.

| Template Name                                    | Framework                                                     |
| ------------------------------------------------ | ------------------------------------------------------------- |
| `@BabDevPagerfanta/default.html.twig`            | None (Pagerfanta's default view)                              |
| `@BabDevPagerfanta/foundation6.html.twig`        | [Foundation](https://get.foundation/index.html) (version 6.x) |
| `@BabDevPagerfanta/semantic_ui.html.twig`        | [Semantic UI](https://semantic-ui.com) (version 2.x)          |
| `@BabDevPagerfanta/tailwind.html.twig`           | [Tailwind CSS](https://tailwindcss.com/)                      |
| `@BabDevPagerfanta/twitter_bootstrap.html.twig`  | [Bootstrap](https://getbootstrap.com) (version 2.x)           |
| `@BabDevPagerfanta/twitter_bootstrap3.html.twig` | [Bootstrap](https://getbootstrap.com) (version 3.x)           |
| `@BabDevPagerfanta/twitter_bootstrap4.html.twig` | [Bootstrap](https://getbootstrap.com) (version 4.x)           |
| `@BabDevPagerfanta/twitter_bootstrap5.html.twig` | [Bootstrap](https://getbootstrap.com) (version 5.x)           |

The labels of the "Previous" and "Next" buttons are localizable in the Twig templates.

See the [Pagerfanta documentation](/open-source/packages/pagerfanta/docs/views) for more information about building a Twig template.

## Default View CSS

The bundle comes with basic CSS for the default view so you can get started quickly.

```twig
<link rel="stylesheet" href="{{ asset('bundles/babdevpagerfanta/css/pagerfanta.css') }}">
```
