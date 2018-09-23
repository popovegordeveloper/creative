"use strict";

/* параметры для gulp-autoprefixer */
var autoprefixerList = [
    'Chrome >= 45',
    'Firefox ESR',
    'Edge >= 12',
    'Explorer >= 10',
    'iOS >= 9',
    'Safari >= 9',
    'Android >= 4.4',
    'Opera >= 30'
];
/* пути к исходным файлам (src), к готовым файлам (build), а также к тем, за изменениями которых нужно наблюдать (watch) */
var path = {
    build: {
        js:    'public/js/',
        css:   'public/css/',
        img:   'public/img/',
        fonts: 'public/fonts/'
    },
    src: {
        js:    'resources/assets/js/main.js',
        style: 'resources/assets/scss/main.scss',
        img:   'resources/assets/img/**/*.*',
        fonts: 'resources/assets/fonts/**/*.*'
    },
    watch: {
        js:    'resources/assets/js/main.js',
        css:   'resources/assets/scss/new-my.scss',
        img:   'resources/assets/img/**/*.*',
        fonts: 'resources/assets/fonts/**/*.*'
    }
};

/* подключаем gulp и плагины */
var gulp = require('gulp'),  // подключаем Gulp
    webserver = require('browser-sync'), // сервер для работы и автоматического обновления страниц
    plumber = require('gulp-plumber'), // модуль для отслеживания ошибок
    rigger = require('gulp-rigger'), // модуль для импорта содержимого одного файла в другой
    sourcemaps = require('gulp-sourcemaps'), // модуль для генерации карты исходных файлов
    sass = require('gulp-sass'), // модуль для компиляции SASS (SCSS) в CSS
    autoprefixer = require('gulp-autoprefixer'), // модуль для автоматической установки автопрефиксов
    cleanCSS = require('gulp-clean-css'), // плагин для минимизации CSS
    uglify = require('gulp-uglify'), // модуль для минимизации JavaScript
    cache = require('gulp-cache'), // модуль для кэширования
    imagemin = require('gulp-imagemin'), // плагин для сжатия PNG, JPEG, GIF и SVG изображений
    jpegrecompress = require('imagemin-jpeg-recompress'), // плагин для сжатия jpeg
    pngquant = require('imagemin-pngquant'), // плагин для сжатия png
    del = require('del'), // плагин для удаления файлов и каталогов
    concat = require('gulp-concat'),
    sftp = require('gulp-sftp'); //лагин для деплоя проекта по sftp

/* задачи */

// сбор стилей
gulp.task('css:build', function () {
    gulp.src([
            path.src.style,
            'bower_components/select2/dist/css/select2.min.css'
        ]) // получим main.scss
        .pipe(plumber()) // для отслеживания ошибок
        .pipe(sourcemaps.init()) // инициализируем sourcemap
        .pipe(sass()) // scss -> css
        .pipe(autoprefixer({ // добавим префиксы
            browsers: autoprefixerList
        }))
        .pipe(cleanCSS()) // минимизируем CSS
        .pipe(sourcemaps.write('./')) // записываем sourcemap
        .pipe(gulp.dest(path.build.css)); // выгружаем в build
});

// сбор js
gulp.task('js:build', function () {
    gulp.src([
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/masonry-layout/dist/masonry.pkgd.js',
        'bower_components/owl.carousel/dist/owl.carousel.min.js',
        'bower_components/flexslider/jquery.flexslider-min.js',
        'bower_components/nouislider/distribute/nouislider.min.js',
        'bower_components/jquery.form-styler/dist/jquery.formstyler.min.js',
        'bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js',
        'bower_components/jquery-sortable/source/js/jquery-sortable-min.js',
        'bower_components/jquery-ui/jquery-ui.min.js',
        'bower_components/jquery-validation/dist/jquery.validate.min.js',
        'bower_components/slick-carousel/slick/slick.js',
        'bower_components/magnific-popup/dist/jquery.magnific-popup.min.js',
        'bower_components/select2/dist/js/select2.min.js',
        'bower_components/dropzone/dist/min/dropzone.min.js',
        'resources/assets/js/jquery.minical.plain.js',
        path.src.js,
        'resources/assets/js/product.js'

    ]) // получим файл main.js
        // .pipe(plumber()) // для отслеживания ошибок
        // .pipe(rigger()) // импортируем все указанные файлы в main.js
        .pipe(concat('main.js'))
        // .pipe(sourcemaps.init()) //инициализируем sourcemap
        // .pipe(uglify()) // минимизируем js
        // .pipe(sourcemaps.write('./')) //  записываем sourcemap
        .pipe(gulp.dest(path.build.js)); // положим готовый файл
});

// перенос шрифтов
gulp.task('fonts:build', function() {
    gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.build.fonts));
});

// обработка картинок, настройки под google page speed
gulp.task('image:build', function () {
    gulp.src(path.src.img) // путь с исходниками картинок
        .pipe(cache(imagemin([ // сжатие изображений
            imagemin.gifsicle({interlaced: true}),
            jpegrecompress({
                progressive: true,
                max: 80,
                min: 70
            }),
            pngquant({quality: '80'}),
            imagemin.svgo({plugins: [{removeViewBox: true}]})
        ])))
        .pipe(gulp.dest(path.build.img)); // выгрузка готовых файлов
});

// очистка кэша
gulp.task('cache:clear', function () {
    cache.clearAll();
});

// сборка
gulp.task('build', [
    'css:build',
    'js:build',
    'fonts:build',
    'image:build'
]);



// запуск задач при изменении файлов
gulp.task('watch', function() {
    gulp.watch(path.watch.css, ['css:build']);
    gulp.watch('resources/assets/scss/popup.scss', ['css:build']);
    gulp.watch('resources/assets/scss/cart.scss', ['css:build']);
    gulp.watch(path.watch.js, ['js:build']);
    gulp.watch('resources/assets/js/product.js', ['js:build']);
    gulp.watch(path.watch.img, ['image:build']);
    gulp.watch(path.watch.fonts, ['fonts:build']);
});

// задача по умолчанию
gulp.task('default', [
    'build'
]);
