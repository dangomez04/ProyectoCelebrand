var gulp = require('gulp');
var gutil = require('gulp-util');
var ftp = require('vinyl-ftp');

var sass = require('gulp-sass');
var uglifycss = require('gulp-uglifycss');

const babel = require("gulp-babel");
const webpack = require("webpack-stream");
const entryPlus = require('webpack-entry-plus');

var path = require('path');
var glob = require("glob");

var ext_replace = require('gulp-ext-replace');

/** DEVELOP TEST **/
var user = "devrevi";
var password = "C722A51%)u:Y";
var host = 'devrevi.com';

var port = 21;
var localFilesGlob = [
	'./application/config/autoload.php',
	'./application/config/routes.php',
	'./application/controllers/*',
	'./application/helpers/*',
	'./application/views/**/*.php',
	'./application/language/**/*.php',
	'./application/libraries/**/*.php',
	'./application/models/**/*.php',
	// './.htaccess',
	// './**/*.php',
	'./js/**/*.js',
	'./css/**/*.css',
	'./assets/**/*.css',
	'./css/scss/**/*.scss',
	'!./gulpfile.js',
	// '!./node_modules/**/*',
	// '!./system/*',
];
var remoteFolder = '/sudomainfolder';

var scss_folder = "./assets/scss/**/*";
var css_folder = "./assets/css";

var js_raw_folder = "js/v2/src/raw/";
var js_compiled_folder = "js/v2/src/compiled/";
var js_packed_folder = "js/v2/packed/";

const entryFiles = [{
	entryFiles: glob.sync("./" + js_compiled_folder + "*.js"),
	outputName(item) {
		return item.replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.') + ".bundle";
	}
}];


// helper function to build an FTP connection based on our configuration
function getFtpConnection() {
	return ftp.create({
		host: host,
		port: port,
		user: user,
		password: password,
		parallel: 5,
		log: myLog
	});
}

function myLog(type, path) {
	var date = new Date();
	if (type.includes("UP")) {
		console.log("[" + ("0" + date.getHours()).slice(-2) + ":" + ("0" + date.getMinutes()).slice(-2) + ":" + ("0" + date.getSeconds()).slice(-2) + "]", "Subida correcta: ", path);
	}
	return true;
}

/**
 * Watch deploy task.
 * Watches the local copy for changes and copies the new files to the server whenever an update is detected
 *
 * Usage: `gulp ftp-watch`
 */
gulp.task('ftp-watch', function () {

	var conn = getFtpConnection();

	gulp.watch(localFilesGlob, {
		interval: 500
	})
		.on('change', function (event) {
			//   console.log('Changes detected! Uploading file "' + event.path + '", ' + event.type);
			return gulp.src([event.path], {
				base: '.',
				buffer: false
			})
				.pipe(conn.newer(remoteFolder)) // only upload newer files 
				.pipe(conn.dest(remoteFolder));
		});
});

gulp.task('sass', function () {
	return gulp.src(scss_folder)
		.pipe(sass.sync().on('error', sass.logError))
		.pipe(uglifycss({
			"maxLineLen": 500,
			"uglyComments": true
		}))
		.pipe(gulp.dest(css_folder));
});

gulp.task('scss-watch', function () {
	gulp.watch(scss_folder, ['sass']);
});


/**
 * Watch JS task.
 * Watches the local javascript files for changes and compiles them whenever an update is detected
 *
 * Usage: `gulp js-watch`
 */
gulp.task('babel', function () {
	return gulp.src(js_raw_folder + "**/*.js")
		.pipe(babel({
			presets: ["@babel/env"],
		}))
		.pipe(gulp.dest(js_compiled_folder));
})

gulp.task("webpack", ["babel"], function () {
	return gulp.src(js_compiled_folder + "/**/*.js")
		.pipe(webpack({
			entry: entryPlus(entryFiles),
			output: {
				filename: '[name].js',
			},
			resolve: {
				alias: {
					'@': path.resolve(__dirname + "/" + js_compiled_folder),
				}
			},
			module: {
				rules: [{
					test: /\.css$/,
					use: ['style-loader', 'css-loader']
				}],
			},
			mode: 'development'
		}))
		.pipe(gulp.dest(js_packed_folder));
})

gulp.task('js-watch', function () {
	gulp.watch([js_raw_folder + "**/*.js"], ['babel', 'webpack'])
});
