var gulp = require('gulp'),
    apidoc = require('gulp-apidoc'),
    phpunit = require('gulp-phpunit'),
    run = require('gulp-run'),
    guppy = require('git-guppy')(gulp),
    prompt = require('gulp-prompt'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer');

/**
 *
 */
gulp.task('apidocs', function (done) {
    return apidoc({
        src: "app/Http/Controllers",
        dest: "public/docs/api",
        config: './'
    }, done);
});

/**
 *
 */
gulp.task('sami-docs', function () {

    var binPath = '.\\vendor\\bin\\sami.php.bat';

    if (process.platform == 'linux') {
        binPath = './vendor/bin/sami.php';
    }
    return run(binPath + ' update config/sami.php').exec();
});

/**
 *
 */
gulp.task('phpunit', function () {

    var binPath = '.\\vendor\\bin\\phpunit.bat';

    if (process.platform == 'linux') {
        binPath = './vendor/bin/phpunit';
    }

    gulp.src('')
        .pipe(phpunit(binPath)).on('error', function (a, b) {

    });
});


gulp.task('bluenote', function () {
    process.chdir('public/admin/app/modules');

    return gulp.src('')
        .pipe(prompt.prompt({
            type: 'input',
            name: 'moduleName',
            message: 'Como será o nome do módulo (lowerCamelCase) ?'
        }, function (r) {
            run('yo bluenote ' + r.moduleName + ' --skip-install').exec();
            return r;
        }));
});



var sassAdminInput = './public/admin/scss/**/*.scss',
    sassAdminOutput = './public/admin/css',
    autoprefixerOptions = {browsers: ['last 2 versions', '> 5%', 'Firefox ESR']},
    sassOptions = {
        errLogToConsole: true,
        outputStyle: 'expanded'
    };

gulp.task('sass-admin', function () {
    return gulp
        .src(sassAdminInput)
        .pipe(sourcemaps.init())
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(gulp.dest(sassAdminOutput));
});


gulp.task('admin-watch', function () {
    return gulp
        .watch(sassAdminInput, ['sass-admin'])
        .on('change', function (event) {
            console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
        });
});

/**
 *
 */
gulp.task('docs', ['apidocs', 'sami-docs']);

/**
 *
 */
gulp.task('pre-commit', ['phpunit', 'docs']);
