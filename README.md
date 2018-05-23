# wp-theme

> WordPress theme for ascribe's landing page and blog

## Prerequisites

- node & npm
- composer

```bash
npm i && composer install
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

## Deployment

Deployment happens via rsync'ing the theme folder `./ascribe/` over SSH, as defined in the [deployment script](deploy.sh).

If you have SSH access to the server, you can do a deployment by calling the deployment script:

```bash
# do a fresh build of the CSS & JS
gulp build

# Then deploy
./deploy.sh
```

It requires the following environment variables to be defined, which is done in the deployment script:

variable | description
---|---
`$ASCRIBE_DEPLOY_SRC` | source of CI build artifacts. On Codeship this is usually just relative to cloned repo path, so `ascribe/`
`$ASCRIBE_DEPLOY_USER` | user for connecting to deploy server
`$ASCRIBE_DEPLOY_HOST` | hostname of deploy server
`$ASCRIBE_DEPLOY_PATH` | path to deploy into on the server, should be `PATH_ON_SERVER/wp-content/themes/`

## Server documentation

Site is hosted on an AWS EC2 instance with WordPress running on nginx.

Option | Server path
---|---
Host | `ec2-52-57-166-130.eu-central-1.compute.amazonaws.com`
WordPress installation | `/var/www/ascribe-wp/`
Active theme | `/var/www/ascribe-wp/wp-content/themes/ascribe/`
