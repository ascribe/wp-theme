# wp-theme

> WordPress theme for ascribe's landing page and blog

[ ![Codeship Status for ascribe/wp-theme](https://codeship.com/projects/33c7d280-cf2d-0133-1c09-5ed74b30bb55/status?branch=master)](https://codeship.com/projects/141150)

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

## Deployment: Continuous Delivery

The site gets built & deployed automatically via Codeship under the following conditions:

- every push builds the site
- every push to the master branch initiates a live deployment

The [deployment script](_ci/deploy.sh) requires the following environment variables to be set:

| variable | description
|--|--
| `$DEPLOY_SRC` | source of CI build artifacts. On Codeship this is usually `~/src/github.com/ascribe/wp-theme/ascribe/`
| `$DEPLOY_USER` | user for connecting to deploy server
| `$DEPLOY_HOST` | hostname of deploy server
| `$DEPLOY_PATH` | path to deploy into on deploy server, should be `PATH_ON_SERVER/wp-content/themes/`
