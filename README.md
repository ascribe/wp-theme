# wp-theme

> WordPress theme for ascribe's landing page and blog

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

## Continuous Delivery

The site gets built & deployed automatically via Codeship under the following conditions:

- every push builds the site
- every push to the master branch initiates a live deployment
