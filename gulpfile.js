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

    return gulp.src('')
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


var bootstrapSass = {
    in: './node_modules/bootstrap-sass/',
    fonts: {
        in: ['./node_modules/bootstrap-sass/assets/fonts/bootstrap/*'],
        out: './public/admin/fonts/'
    }
};

var fontAwesome = {
    in: 'node_modules/font-awesome/fonts/*'
};

var scss = {
    admin: {
        in: './public/admin/scss/**/*.scss',
        out: './public/admin/css'
    },
    options: {
        errLogToConsole: true,
        outputStyle: 'expanded',
        includePaths: [
            bootstrapSass.in + 'assets/stylesheets',
            './node_modules/font-awesome/scss'
        ]
    }
};


var autoprefixerOptions = {browsers: ['last 2 versions', '> 5%', 'Firefox ESR']};

// copy bootstrap required fonts to dest
gulp.task('fonts', function () {
    gulp.src(bootstrapSass.fonts.in)
        .pipe(gulp.dest(bootstrapSass.fonts.out));

    return gulp.src(fontAwesome.in)
        .pipe(gulp.dest(bootstrapSass.fonts.out));
});


gulp.task('sass-admin', ['fonts'], function () {
    return gulp
        .src(scss.admin.in)
        .pipe(sourcemaps.init())
        .pipe(sass(scss.options).on('error', sass.logError))
        // .pipe(sourcemaps.write())
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(gulp.dest(scss.admin.out));
});


gulp.task('admin-watch', function () {
    return gulp
        .watch(scss.admin.in, ['sass-admin'])
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
gulp.task('pre-commit', ['phpunit']);
