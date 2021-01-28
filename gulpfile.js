const gulp 			= require('gulp');
const plumber 		= require('gulp-plumber');
const sass 			= require('gulp-sass');
const sassGlob 		= require('gulp-sass-glob');
const rename 		= require('gulp-rename');
const autoprefixer 	= require('gulp-autoprefixer');
const minifyCSS     = require('gulp-minify-css');
const uglify        = require('gulp-uglify');
const concat        = require('gulp-concat');
const gutil         = require('gulp-util');
const browsersync   = require('browser-sync').create();
const sourcemaps	= require('gulp-sourcemaps');

gulp.task('styles',  done =>  {
	gulp.src('scss/style.scss')
		.pipe(sassGlob())
		.pipe(sourcemaps.init())
		.pipe(plumber(function (error) {
			console.log(error);
			this.emit('end');
		}))
		.pipe(sass())
		.pipe(autoprefixer({browsers: ['defaults', 'iOS >= 8']}))
		.pipe(minifyCSS())
		.pipe(rename('style.css'))
		.pipe(sourcemaps.write('/'))
		.pipe(gulp.dest('./'))
		.pipe(browsersync.stream())
	done();
});

gulp.task('scripts', done => {
	gulp.src('javascript/[^_]*.js')
		.pipe(concat('main.js'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify().on('error', function(error){
			gutil.log(gutil.colors.red('[Error]'), error.toString());
			this.emit('end');
		}))
		.pipe(gulp.dest('javascript/min'))
		.pipe(browsersync.stream())
	done();
});

gulp.task('build', function() {
	browsersync.init({
		proxy: {
			target: 'https://demosite.local'
		},
		snippetOptions: {
			whitelist: ['/wp-admin/admin-ajax.php'],
			blacklist: ['/wp-admin/**']
		}
	});

	gulp.watch('sass/**/*.scss', gulp.series('styles'));
	gulp.watch('js/[^_]*.js', gulp.series('scripts'));
	browsersync.reload();
});

gulp.task('default', gulp.parallel(gulp.series('build')));
