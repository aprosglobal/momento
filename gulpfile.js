/* Config Gulp Task */
var gulp = require('gulp'),
plumber = require('gulp-plumber'),
nib = require('nib'),
concat = require('gulp-concat'),
findPort = require('find-port'),
stylus = require('gulp-stylus'),
shell = require('gulp-shell');

// Funciones Globales
function makeid(){
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 8; i++ )
    text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

function StartsWith(s1, s2) {
    return (s1.length >= s2.length && s1.substr(0, s2.length) == s2);
}

/*var server_port = 9090;
findPort(server_port, server_port+10, function(ports) {
server_port = ports[0];
console.log('using port '+server_port)
});

console.log('using port '+server_port)*/

//Directorios de sistema
var path = {
    master_styl: 'static/stylus/styles.styl',
    production_styl: 'static/stylus/production.styl',
    stylus_dirs: 'static/stylus/**/*.styl',
    stylus_blocks_dir: 'static/stylus/blocks/*.styl',
    css_builds: 'static/css/builds/*.css',
    css_builds_dir: 'static/css/builds/',
    css: 'static/css/'
}

// Concat Css
gulp.task('concat_css', function () {
    setTimeout(function () {
        return gulp.src(path.css_builds)
        .pipe(plumber())
        .pipe(concat('blocks_styl.css'))
        .pipe(plumber.stop())
        .pipe(gulp.dest(path.css)).on('end', function(){
            console.log('>>>>>>>>>> Css Concatenados perfectamente...');
        })
    }, 256);
});

// Stylus Compiler
gulp.task('stylus', function () {
    return gulp.src(path.master_styl)
    .pipe(plumber())
    .pipe(stylus({ use: nib(),  import: ['nib'], compress: true}))
    .pipe(plumber.stop())
    .pipe(gulp.dest(path.css))
});



// Stylus Compiler
gulp.task('stylus_prod', function () {
    return gulp.src(path.production_styl)
    //.pipe(plumber())
    .pipe(stylus({ use: nib(),  import: ['nib'], compress: true}))
    //.pipe(plumber.stop())
    .pipe(gulp.dest(path.css))
});


// Stylus Compiler
gulp.task('stylus_blocks', function () {
    return gulp.src(path.stylus_blocks_dir)
    .pipe(plumber())
    .pipe(stylus({ use: nib(),  import: ['nib','../config/identity'], compress: true}))
    .pipe(plumber.stop())
    .pipe(gulp.dest(path.css_builds_dir)).on('end', function(){
        setTimeout(function () {
            return gulp.src(path.css_builds)
            .pipe(plumber())
            .pipe(concat('blocks_styl.css'))
            .pipe(plumber.stop())
            .pipe(gulp.dest(path.css)).on('end', function(){
                console.log('>>>>>>>>>> Css Concatenados perfectamente...');
            })
        }, 1);
    })
});


function styl_com_con(file){
    if (StartsWith(file.path,"/")){
        file_name = file.path.split('/')[file.path.split('/').length - 1];
    }else{
        file_name = file.path.split('\\')[file.path.split('\\').length - 1];
    }
    console.log('>>>>>>>>>> Compiling '+file_name+' : running tasks...');
    gulp.src(file.path)
    .pipe(plumber())
    .pipe(stylus({ use: nib(),  import: ['nib','../config/identity']}))
    .pipe(plumber.stop())
    .pipe(gulp.dest(path.css_builds_dir))
    console.log('>>>>>>>>>> Compiled! '+file_name);
}

// watchers filePaths #withReload
gulp.task('watch', function () {
    gulp.watch(path.stylus_blocks_dir, ['concat_css']).on('change', function(file) {return styl_com_con(file);});
    gulp.watch(path.stylus_dirs, ['stylus']);
});

gulp.task('default', ['stylus_blocks','stylus','watch']);
gulp.task('server', ['stylus_blocks','stylus','watch']);
