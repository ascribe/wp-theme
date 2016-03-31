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

The theme under `ascribe/` gets built & deployed automatically via Codeship under the following conditions:

- every push builds the site
- every push to the master branch initiates a live deployment

Deployment happens via rsync'ing the theme build artifacts as defined in the [deployment script](_ci/deploy.sh):

```bash
sudo rsync --recursive --delete --delete-excluded --checksum --verbose -e "ssh" $DEPLOY_SRC $DEPLOY_USER@$DEPLOY_HOST:$DEPLOY_PATH
```

The [deployment script](_ci/deploy.sh) requires the following environment variables to be set in Codeship:

variable | description
---|---
`$DEPLOY_SRC` | source of CI build artifacts. On Codeship this is usually just relative to cloned repo path, so `ascribe/`
`$DEPLOY_USER` | user for connecting to deploy server
`$DEPLOY_HOST` | hostname of deploy server
`$DEPLOY_PATH` | path to deploy into on the server, should be `PATH_ON_SERVER/wp-content/themes/`

## Server documentation

Site is hosted on an AWS EC2 instance with WordPress running on nginx.

Option | Server path
---|---
Host | `ec2-52-29-65-193.eu-central-1.compute.amazonaws.com`
WordPress installation | `/var/www/ascribe-wp/`
Active theme | `/var/www/ascribe-wp/wp-content/themes/ascribe/`
