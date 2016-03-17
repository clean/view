# Clean\View

[![Build Status](https://travis-ci.org/clean/view.svg?branch=master)](https://travis-ci.org/clean/view)
[![Code Climate](https://codeclimate.com/github/clean/view/badges/gpa.svg)](https://codeclimate.com/github/clean/view)
[![Test Coverage](https://codeclimate.com/github/clean/view/badges/coverage.svg)](https://codeclimate.com/github/clean/view/coverage)
[![Issue Count](https://codeclimate.com/github/clean/view/badges/issue_count.svg)](https://codeclimate.com/github/clean/view)

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
