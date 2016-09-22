var gulp = require('gulp'),
    browserify = require('browserify'),
    babelify = require('babelify'),
    source = require('vinyl-source-stream'),
    sass = require('gulp-sass'),
    packageJSON = require('./package.json'),
    semver = require('semver');

// Make sure the Node.js version is valid.
if (!semver.satisfies(process.versions.node, packageJSON.engines.node)) {
    console.error('Invalid Node.js version. You need to be using ' + packageJSON.engines.node);
    process.exit(1);
}

gulp.task('js', function () {
    browserify({
        entries: './javascript/src/main.js',
        extensions: ['.js'],
        debug: true
    })
    .transform(babelify)
    .bundle()
    .pipe(source('bundle.js'))
    .pipe(gulp.dest('./javascript/dist'));
});

gulp.task('sass', function () {
    gulp.src('./scss/main.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css'));
});

gulp.task('js:watch', function () {
    gulp.watch('./javascript/**/*.js', ['js']);
});

gulp.task('sass:watch', function () {
    gulp.watch('./scss/**/*.scss', ['sass']);
});

gulp.task('default', ['js', 'sass', 'js:watch', 'sass:watch']);
