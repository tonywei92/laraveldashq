const gulp = require('gulp');
const watch = require('gulp-watch');
const postcss = require('gulp-postcss');
const sass = require('gulp-sass');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

gulp.task('compileScss', function(){
    return gulp.src('scss/app.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(gulp.dest('../'));
});

gulp.task('compileScssProd', function(){
    return gulp.src('scss/app.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(gulp.dest('../'));
});
 
gulp.task('scss:watch', function(){
    return watch('scss/**/*.scss',  function(){
        gulp.start('compileScss');
    }); 
});


gulp.task('scss:prod', function(){
    return gulp.start('compileScssProd');
});

