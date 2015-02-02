var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

gulp.task('sass', function(){
    gulp.src(['dev/scss/*.scss'])
        .pipe(sourcemaps.init())
            .pipe(sass())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('build/css'));
});

gulp.task('watch', ['sass'], function(){
    gulp.watch('dev/scss/*.scss', ['sass']);
});

gulp.task('default', function(){
    console.log('gulp is running!');
});