# Getting Started

A barebones PHP app that makes use of the [Silex](http://silex.sensiolabs.org/) web framework, which can easily be deployed to Heroku.

The purpose of this application is to retrieve a random card deck from an external website.

This application supports the [Getting Started with PHP on Heroku](https://devcenter.heroku.com/articles/getting-started-with-php) article - check it out.

## Deploying

Install the [Heroku Toolbelt](https://toolbelt.heroku.com/).

```sh
$ git clone git@github.com:itsmealex79/code-sample.git # or clone forked itsmealex79/code-sample
$ cd code-sample
$ heroku login
$ heroku apps:create
$ git push heroku master
$ heroku open
```

## Documentation

For more information about using PHP on Heroku, see these Dev Center articles:

- [PHP on Heroku](https://devcenter.heroku.com/categories/php)
