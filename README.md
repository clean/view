# Clean\View

Provides an implementation of the [TemplateView](http://martinfowler.com/eaaCatalog/templateView.html) and [TwoStepView](http://martinfowler.com/eaaCatalog/twoStepView.html) patterns, with support for helpers.

## Installation

via Composer

```json
require: {
  "clean/view": "dev-master"
}
```

## Usage

```php
$view = new View('template.phtml', ['placeholder' => 'value', ...]);
$view->setParent(new View('layout.phtml', [...]));
echo $view;
```
