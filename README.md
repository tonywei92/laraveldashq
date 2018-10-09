# Laravel DashQ


![alt text](https://raw.githubusercontent.com/tonywei92/laraveldashq/master/resources/assets/logo.png)

Inspired by Laravel Horizon, a Queue Dashboard to monitor Queue Jobs with following features:
* Work with Queue with 'database' driver.
* Retry one or more Jobs.
* Delete one or more Jobs.
* Emptying Jobs Table.
* Emptying Failed Jobs Table.
* Search any queues, payloads and exceptions.
* Responsive design, enjoy the view at any screen sizes. 


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a Laravel framework.

### Prerequisites
Make sure you have choose 'database' driver for Queue in `config/queue.php` and already have 'failed_jobs' and 'jobs' table.

Require this package:

```
$ composer require tonysong/dashq
```

### Installing

A step by step

Publish resources files (css and js)

```
$ php artisan vendor:publish --tag=dashq.assets
$ php artisan vendor:publish --tag=dashq.config
```

Navigate to `yourweb.com/dashq` at browser, and you're ready to go.

### Configuration
The configuration file placed in `config/dashq.php`

##### middleware
Add DashQ route middleware, such as Login and various checks.
##### uri
Set route path to DashQ, default is `dashq` (`youweb.com/dashq`)
##### db
Set database connection which DashQ should connect to database that have `jobs` and `failed_jobs` table.
  

## Development

Setup SCSS development.

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

CSS output will be at `/resources/assets/app.css` which is already attached to "mock" html files.

### Javascript
LaravelDashQ using plain Javascript, the JS file located at `/resources/assets/app.js`.

### Testing view
Three files already provided to mock real rendered by Laravel Blade template, `home.html`, `jobs.html`, `failedjobs.html`, these files are located in `/resources/assets`

### Assets file deployment:
To deploy `app.js` and `app.css`, run following command:
```
$ php artisan vendor:publish --tag=dashq.assets --force
```
## Author
* **Tony Song** - *Initial work* - [tonywei92@gmail.com](mailto:tonywei92@gmail.com)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to Taylor Otwell, the creator of Laravel
* PostCSS, Gulp, etc.
