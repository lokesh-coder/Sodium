var gulp = require('gulp');
var browserSync = require('browser-sync');
var compass = require('gulp-compass');
var reload = browserSync.reload;

module.exports = gulp;

// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
  browserSync({
    server: {
      baseDir: "./",
      directory: true
    },
    port:2233
  });
});

gulp.task('compass', function() {
  gulp.src('app/scss/**/*.scss')
    .pipe(compass({
      css: 'app/css',
      sass: 'app/scss'
    }))
    .pipe(gulp.dest('app/assets/temp'))
    .pipe(browserSync.reload({
      stream: true
    }));
});

gulp.task('bs-reload', function() {
  browserSync.reload();
});



// Default task to be run with `gulp`
gulp.task('default', ['compass', 'browser-sync'], function() {
  gulp.watch("app/scss/**/*.scss", ['compass']);
  gulp.watch("app/css/**/*.css", ['bs-reload']);
  gulp.watch("*.html", ['bs-reload']);
  gulp.watch("app/js/**/*.js", ['bs-reload']);
});