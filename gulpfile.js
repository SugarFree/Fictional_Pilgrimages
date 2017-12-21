var gulp = require('gulp');

var ftp = require('vinyl-ftp');
var minimist = require('minimist');
var args = minimist(process.argv.slice(2));
gulp.task('deploy', function() {
  var conn = ftp.create({
    port: 21,
    host: 'ftp.fictionalpilgrimages.altervista.org',
    user: 'fictionalpilgrimages',
    password: 'rangumicpu98'
  });
  gulp.src(['./*.html', './*.css', './*.js', './*.php', './img/*.jpg', './img/*.png'])
    .pipe(conn.newer('/'))
    .pipe(conn.dest('/'));
});
