var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-ruby-sass');

gulp.task('sass', function()
{
    var options = {sourcemap: true, unixNewlines: true, style: 'compressed'};

    return gulp.src('app/assets/sass/**/*.scss')
        .pipe(sass(options))
        .pipe(gulp.dest('public/css'));
});