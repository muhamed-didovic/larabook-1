var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-ruby-sass');

gulp.task('sass', function()
{
    var options = {unixNewlines: true, style: 'compressed'};

    gulp.src('app/assets/sass/main.scss')
        .pipe(sass(options))
        .pipe(gulp.dest('public/css'));
});

gulp.task('watch', function() {
    gulp.watch('app/assets/sass/**/*.scss', ['sass']);
});

gulp.task('default', ['watch']);