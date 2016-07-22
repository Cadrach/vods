require('es6-promise').polyfill();
var gulp = require('gulp');
var usemin = require('gulp-usemin');
var uglify = require('gulp-uglify');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');
var rimraf = require('gulp-rimraf');
var ngAnnotate = require('gulp-ng-annotate');

var elixir = require('laravel-elixir');

/*
|--------------------------------------------------------------------------
| Elixir Asset Management
|--------------------------------------------------------------------------
|
| Elixir provides a clean, fluent API for defining some basic Gulp tasks
| for your Laravel application. By default, we are compiling the Sass
| file for our application, as well as publishing vendor resources.
|
*/

elixir(function(mix) {
    mix.sass('app.scss');
    mix.task('default', 'public/bower/**/*.js');
    mix.task('default', 'resources/views/index-src.php');
});

gulp.task('default', ['minify', 'fix-template', 'clean'], function(){

});

/**
 * Create minified files
 */
gulp.task('minify', function() {
    return gulp.src('resources/views/index-src.php')
        .pipe(usemin({
            assetsDir: 'public',
            css: [minifyCss(), 'concat'],
            libraries: [uglify(), 'concat'], //,
            application: [ngAnnotate({add: true}), 'concat'] //, uglify()
        }))
        .pipe(gulp.dest('public'));
});

/**
 * Fixing template (placing it in the correct place with correct name)
 */
gulp.task('fix-template', ['minify'], function() {
    return gulp.src('public/index-src.php')
        .pipe(rimraf())
        .pipe(rename("index.php"))
        .pipe(gulp.dest('resources/views'));
});

/**
 * Clean generated files
 */
gulp.task('clean', function() {
    var generated = ['public/js/dist/libs.js', 'resources/views/index.php'];
    return gulp.src(generated)
        .pipe(rimraf());
});