# gambling-com-affiliates-app-backend

This project using Sail, a built-in solution for running Laravel applications using Docker.
Be sure to have Docker installed and running: https://docs.docker.com/desktop/#download-and-install.

## Recommended IDE Setup

[VSCode](https://code.visualstudio.com/) + [Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client) + [PHPDoc Generator 2022](https://marketplace.visualstudio.com/items?itemName=SamuelHinchliffe.phpdoc-generator-2022).

## Project Setup

You will need composer if not installed (https://getcomposer.org/download/).

```sh
composer install
```

### Start Sail

```sh
./vendor/bin/sail up
```
In case you are using Linux and you get the message **Docker is not running**, you will need a few extra steps to be able to run Docker as a non-root user (https://docs.docker.com/engine/install/linux-postinstall/).

The route to get the corresponding affiliates data will be located at
```sh
http://localhost/api/affiliates
```
