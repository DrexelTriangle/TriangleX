var gulp = require('gulp'),
	sass = require('gulp-ruby-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	cssnano = require('gulp-cssnano'),
	jshint = require('gulp-jshint'),
	uglify = require('gulp-uglify'),
	imagemin = require('gulp-imagemin'),
	rename = require('gulp-rename'),
	concat = require('gulp-concat'),
	notify = require('gulp-notify'),
	cache = require('gulp-cache'),
	livereload = require('gulp-livereload'),
	del = require('del');

gulp.task('styles', function()
{
	return sass('scss/style.scss', { style: 'expanded' })
	.pipe(autoprefixer('last 2 version'))
	.pipe(gulp.dest('/'))
	.pipe(rename({suffix: '.min'}))
	.pipe(cssnano())
	.pipe(gulp.dest('/'))
	.pipe(notify({ message: 'Styles task complete' }));
});