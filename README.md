# Laravel DashQueue

Queue Dashboard to monitor Jobs and Failed Job with following features:
* Work with Queue with 'database' driver
* Retry one or more Jobs
* Delete one or more Jobs
* Emptying Jobs Table
* Emptying Failed Jobs Table
* Search any queues, payloads and exceptions


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a Laravel framework.

### Prerequisites
Make sure you have choose 'database' driver for Queue in `config.app`

Require this package:

```
$ composer require tonysong/laraveldashq
```

### Installing

A step by step

Publish resources files (css and js)

```
$ php artisan vendor:publish --tag=dashq.assets
```

No try to navigate to `/dashq` at browser.

## Development

Develop SCSS file add, modify and enhance app look.

### SCSS Compilation

* Navigate to `resource/assets`, and  run:

```
$ npm install
```
* install Gulp Globally
```
$ npm install gulp-cli -g 
```

To start compiling watch for changes run:
```
$ gulp scss:watch -g
```
To minify SCSS file (production):
```
$ gulp scss:prod 
```

CSS output will be at `/resources/assets/app.css`

### Javascript
LaravelDashQ using plain Javascript, the JS file located at `/resources/assets/app.js`.

### Testing view
Three files already prepared to mock real renderer blade template already provided, `home.html`, `jobs.html`, ``failedjobs.html, these files located at `/resources/assets`

### Assets file deployment:
To deploy `app.js` and `app.css`, run following command:
```
$ php artisan vendor:publish --tag=dashq.assets --force
```

* **Tony Song** - *Initial work* - [tonywei92@gmail.com](mailto:tonywei92@gmail.com)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to Taylor Otwell, the creator of Laravel
