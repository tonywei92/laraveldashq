let gulp = require('gulp');
let watch = require('gulp-watch');
let postcss = require('gulp-postcss');
let sass = require('gulp-sass');
let autoprefixer = require('autoprefixer');
gulp.task('compileScss', function(){
    return gulp.src('scss/app.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(gulp.dest('../../resources/assets'));
});
 
gulp.task('scss:watch', function(){
    return watch('scss/**/*.scss',  function(){
        gulp.start('compileScss');
    }); 
});