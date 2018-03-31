'use strict';
var autoprefixer = require("gulp-autoprefixer"),
gulp = require("gulp"),
sass = require("gulp-sass");

let sassOptions = {
    outputStyle: 'compressed'
};

const AUTOPREFIX_OPTIONS = ["last 2 versions", "iOS 7"];
const SASS_OPTIONS = { errLogToConsole: true, outputStyle: "expanded" };

//Tasks
gulp.task('styles', function() {
    gulp.src('sass/**/*.scss')
		.pipe(sass(SASS_OPTIONS).on("error", sass.logError))
        .pipe(autoprefixer({browsers: AUTOPREFIX_OPTIONS}))
        .pipe(gulp.dest('./css/'));
});

//Watch task
gulp.task('default',function() {
    gulp.watch('sass/**/*.scss',['styles']);
});