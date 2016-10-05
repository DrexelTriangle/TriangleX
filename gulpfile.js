var gulp = require('gulp'),
	sass = require('gulp-ruby-sass'),
	jshint = require('gulp-jshint'),
	uglify = require('gulp-uglify');

gulp.task('default', ['sass']);

gulp.task('sass', function()
{
    return sass('scss/syle.scss')
        .on('error', sass.logError)
        .pipe(gulp.dest('./'));
});