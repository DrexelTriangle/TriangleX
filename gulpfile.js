var gulp = require('gulp'),
	sass = require('gulp-ruby-sass'),
    concat = require('gulp-concat'),
	jshint = require('gulp-jshint'),
	uglify = require('gulp-uglify');

gulp.task('default', ['sass']);

gulp.task('sass', () =>
{
    return sass('scss/syle.scss')
        .on('error', sass.logError)
        .pipe(concat('style.css'))
        .pipe(gulp.dest('./'));
});