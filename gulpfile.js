'use strict';

var gulp = require('gulp'),
	sass = require('gulp-sass');

gulp.task('default', ['sass']);

gulp.task('sass', function()
{
    return gulp.src('./scss/*.scss')
		.pipe(sass({ includePaths : ['scss/'] }))
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('./'));
});