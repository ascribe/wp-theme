'use strict';

// load plugins
var $ = require('gulp-load-plugins')();

// manually require modules that won't get picked up by gulp-load-plugins
var gulp = require('gulp'),
    chalk = require('chalk'),
    pkg = require('./package.json'),
    browser = require('browser-sync');

// handle errors
var onError = function(error) {
    console.log(chalk.red('You fucked up:', error.message, 'on line' , error.lineNumber));
    this.emit('end');
}


// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
// Terminal Banner
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

console.log("");
console.log(chalk.gray("   <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>"));
console.log(chalk.cyan("                        ┌─┐┌─┐┌─┐┬─┐┬┌┐ ┌─┐"));
console.log(chalk.cyan("                        ├─┤└─┐│  ├┬┘│├┴┐├┤ "));
console.log(chalk.cyan("                        ┴ ┴└─┘└─┘┴└─┴└─┘└─┘"));
console.log(chalk.gray("   <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>"));
console.log("");


// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
// Config
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

// Browsers to target when prefixing CSS.
var COMPATIBILITY = ['Chrome >= 30', 'Safari >= 6.1', 'Firefox >= 35', 'Opera >= 32', 'iOS >= 8', 'Android >= 4', 'ie >= 10'];

// paths
var SRC           = './ascribe/',
    DIST          = './ascribe/';

// code banner
var BANNER = [
    '/**',
    ' ** <%= pkg.name %> v<%= pkg.version %>',
    ' ** <%= pkg.description %>',
    ' ** <%= pkg.homepage %>',
    ' **',
    ' ** <%= pkg.author.name %> <<%= pkg.author.email %>>',
    ' **',
    ' ** ',
    ' ** <%= pkg.repository.url %> ',
    ' **/',
    ''
].join('\n');

// local dev server stuff
var PROXY         = 'http://localhost:8888'


// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
// Tasks
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

//
// Styles
//
gulp.task('css', function() {
    return gulp.src(SRC + 'assets/_src/less/ascribe.less')
        .pipe($.less()).on('error', onError)
        .pipe($.autoprefixer({ browsers: COMPATIBILITY }))
        .pipe($.cssmin())
        .pipe($.header(BANNER, { pkg: pkg }))
        .pipe(gulp.dest(DIST + 'assets/dist/css/'))
        .pipe($.rename({ suffix: '.min' }))
        .pipe(gulp.dest(DIST + 'assets/dist/css/'))
        .pipe(browser.stream());
});


//
// JavaScript
//
gulp.task('js', function() {
    return gulp.src(SRC + 'assets/_src/js/ascribe.js')
    .pipe($.include())
    .pipe($.uglify()).on('error', onError)
    .pipe($.header(BANNER, { pkg: pkg }))
    .pipe(gulp.dest(DIST + 'assets/dist/js/'))
    .pipe($.rename({suffix: '.min'}))
    .pipe(gulp.dest(DIST + 'assets/dist/js/'));
});


//
// Browser sync
//
gulp.task('serve', function() {
    browser.init({
        proxy: PROXY
    });
    gulp.watch([SRC + 'assets/_src/less/**/*'], ['css']);
    gulp.watch([SRC + 'assets/_src/js/**/*'], ['js']);
    gulp.watch(SRC + '**/*.{php,svg,png,jpg,gif}').on('change', browser.reload);
});


//
// Dev Server
//
gulp.task('default', ['css', 'js', 'serve']);


//
// Production build
//
gulp.task('build', ['css', 'js']);
