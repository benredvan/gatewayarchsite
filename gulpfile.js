var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var gutil = require( 'gulp-util' );
var ftp = require( 'vinyl-ftp' );

var fileGlobsToWatch = [
	'src/**',
	'css/**',
	'images/**',
	'js/**',
	'fonts/**',
	'*.php'
];

//Sass builder
gulp.task('styles', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./css/'))
});

//Ftp sync
gulp.task('deploy-push', function () {

	var conn = ftp.create( {
		host:     '77.104.146.35',
		user:     'gar@oldstlouis.com',
		password: 'UZhnOI1KukP)',
		parallel: 10,
		log:      gutil.log
	} );



	// using base = '.' will transfer everything to /public_html correctly
	// turn off buffering in gulp.src for best performance
	return gulp.src( fileGlobsToWatch, { base: '.', buffer: false } )
		.pipe( conn.newer( '/wp-content/themes/gateway-arch' ) ) // only upload newer files
		.pipe( conn.dest( '/wp-content/themes/gateway-arch' ) );

} );
//https://loige.co/gulp-and-ftp-update-a-website-on-the-fly/

//Watch task
gulp.task('default',function() {
    gulp.watch('sass/**/*.scss',['styles']);
});
