# wp-theme

> WordPress theme for Ascribe's landing page and blog

## Prerequisites

- node & npm
- composer

```bash
npm install && composer
```

## Development

On top of compiling css & js files, this starts a local, live-reloading server with BrowserSync:

```bash
gulp
```

The task assumes the following:

- WordPress exposed via MAMP under http://localhost:8888

The following compiles css & js files only:

```bash
gulp build
```
