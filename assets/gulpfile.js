const { src, dest, series, parallel, watch }    = require('gulp');
const sass                                      = require('gulp-sass')(require('sass'));
const gcmq                                      = require('gulp-group-css-media-queries');
const autoprefixer                              = require('gulp-autoprefixer');
const cleanCSS                                  = require('gulp-clean-css');
const del                                       = require('del');
const gulpif                                    = require('gulp-if');
const sourcemaps                                = require('gulp-sourcemaps');
const webpackStream                             = require("webpack-stream");
const named                                     = require('vinyl-named');
const browserSync                               = require('browser-sync').create();

const isDev                                     = (process.argv.indexOf('--dev') !== -1);
const isProd                                    = !isDev;
const isSync                                    = (process.argv.indexOf('--sync') !== -1);

const watchFile = () => {
        watch('./src/scss/**/*.scss', style);
        watch('./src/js/**/*.js', script);
        watch('./src/img/**/*', images);
}

const clean = async () => {
    return await del(['./dist/*'], {force: true});
}

const style = () => {
    return src(['./src/scss/main.scss', "./src/scss/_*.scss", "./src/scss/blocks/*.scss", "./src/scss/wp-admin.scss"])
        .pipe(gulpif(isDev, sourcemaps.init()))
        .pipe(sass().on('error', sass.logError))
        .pipe(gcmq())
        .pipe(autoprefixer({cascade: false}))
        .pipe(gulpif(isProd, cleanCSS({ level: 2 })))
        .pipe(gulpif(isDev, sourcemaps.write('./maps/')))
        .pipe(dest('./dist/css'))
        .pipe(gulpif(isSync , browserSync.reload( {stream:true} )));
}

const script = () => {
    return src(["./src/js/*.js", "!./src/js/_*.js", "./src/js/blocks/*.js"])
        .pipe(named())
        .pipe(gulpif(isDev, webpackStream({
            mode: 'development',
            output: {
                filename: '[name].js'
            },
            watch: false,
            devtool: "source-map",
            module: {
                rules: [
                    {
                        test: /\.m?js$/,
                        exclude: /(node_modules)/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: [['@babel/preset-env', {
                                    debug: true,
                                    corejs: 3,
                                    useBuiltIns: "usage"
                                }]]
                            }
                        }
                    }
                ]
            }
        })))
        .pipe(gulpif(isProd, webpackStream({
            mode: 'production',
            output: {
                filename: '[name].js'
            },
            module: {
                rules: [
                    {
                        test: /\.m?js$/,
                        exclude: /(node_modules)/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: [['@babel/preset-env', {
                                    corejs: 3,
                                    useBuiltIns: "usage"
                                }]]
                            }
                        }
                    }
                ]
            }
        })))
        .pipe(dest('./dist/js/'))
        .pipe(gulpif(isSync , browserSync.reload( {stream:true} )));
}

const fonts = () => {
    return src('./src/fonts/*')
        .pipe(dest('./dist/fonts'))
}

const images = () => {
    return src('./src/img/**/*')
        .pipe(dest('./dist/img'))
}

const server = () => {

    var files = [
        './src/scss/**/*.scss',
        './src/js/**/*.js',
        '../**/*.php'
    ];

    var homeUrl     = "http://blue.glass.loc";

    browserSync.init( files, {
        proxy: homeUrl,
        notify: true
    });

    watchFile();
}


exports.clean       = clean;
exports.style       = style;
exports.script      = script;
exports.fonts       = fonts;
exports.images      = images;
exports.watchFile   = watchFile;
exports.server      = server;

const build = series(clean, parallel(style, script, fonts, images))

exports.build = build;
exports.dev = series(build, server);


