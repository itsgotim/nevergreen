var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');

//compile sass into css and inject into browser
gulp.task('sass', function() {
	return gulp.src(['src/scss/bootstrap.scss', 'src/scss/style.scss'])
		.pipe(sass()) //{'outputStyle':'compressed'}
		.pipe(gulp.dest("dist/css"))
		.pipe(gulp.dest("./"))
		.pipe(browserSync.stream());
});

// Move the javascript files into our /src/js folder
gulp.task('js', function() {
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js', 'node_modules/popper.js/dist/umd/popper.min.js'])
        .pipe(gulp.dest("dist/js"))
        .pipe(browserSync.stream());
});

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

    browserSync.init({
        //server: "./"  
		proxy: "localhost/nevergreen/"
    });

    gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'], ['sass']);
    gulp.watch("*.php").on('change', browserSync.reload);
});

gulp.task('default', ['js','serve']);