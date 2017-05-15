// Gulp processing directives for highergroundtattoo.com
// Plugin manifest
// master package manifest
var autoprefix = require( 'gulp-autoprefixer' );
var bourbon    = require( 'node-bourbon' );
var concat     = require( 'gulp-concat' );
var gulp       = require( 'gulp' );
var jshint     = require( 'gulp-jshint' );
var rename     = require( 'gulp-rename' );
var sass       = require( 'gulp-sass' );
var stylish    = require( 'jshint-stylish' );
var uglify     = require( 'gulp-uglify' );

gulp.task( 'lint', function() {
	return gulp
		.src( 'dev/js/*.js' )
		.pipe( jshint() )
		.pipe( jshint.reporter( 'jshint-stylish', { beep: true } ) );
});

gulp.task( 'scripts', function() {
	return gulp
		.src( [ 'dev/bower_components/bootstrap-sass/assets/javascripts/bootstrap.js', 'dev/bower_components/smooth-scroll.js/dist/js/smooth-scroll.js', 'dev/js/main.js' ] )
		.pipe( concat( 'main.js' ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( uglify() )
		.pipe( gulp.dest( 'site/web/app/themes/galyonj' ) )
});

// setup for autoprefixer
var autoprefixerOptions =  {
	browsers: [ 'last 2 versions', '> 5%' ]
};

gulp.task( 'sass', function() {
	return gulp
		.src( 'dev/scss/*.scss' )
		.pipe( sass( { includePaths: require( 'node-bourbon' ).includePaths } ) )
		.pipe( autoprefix( autoprefixerOptions ) )
		.pipe( gulp.dest( 'site/web/app/themes/galyonj' ) )
		.pipe( sass( { outputStyle: 'expanded' } ) )
		.pipe( rename( { suffix: '.min'} ) )
		.pipe( sass( { outputStyle: 'compressed' } ) )
		.pipe( gulp.dest( 'site/web/app/themes/galyonj' ) );
	//.resume();
});

gulp.task( 'watch', function() {
	gulp.watch( 'dev/js/**/*.js', [ 'lint', 'scripts' ] );
	gulp.watch( [ 'dev/scss/**/*.scss', 'dev/bower_components/bootstrap-sass/assets/stylesheets/**/*.scss' ], [ 'sass' ] );
});

gulp.task( 'default', [ 'lint', 'scripts', 'sass', 'watch' ] );