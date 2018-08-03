var gulp = require('gulp');
var sass = require('gulp-sass');
var smartgrid = require('smart-grid');
var autoprefixer = require('gulp-autoprefixer');
var path = './';

/* It's principal settings in smart grid project */
var settings = {
    outputStyle: 'scss', /* less || scss || sass || styl */
    columns: 12, /* number of grid columns */
    offset: '30px', /* gutter width px || % || rem */
    filename: '_smart-grid',
    mobileFirst: false, /* mobileFirst ? 'min-width' : 'max-width' */
    container: {
        maxWidth: '1200px', /* max-width оn very large screen */
        fields: '30px' /* side fields */
    },
    breakPoints: {
        lg: {
            width: '1100px', /* -> @media (max-width: 1100px) */
        },
        md: {
            width: '960px'
        },
        sm: {
            width: '780px',
            fields: '15px' /* set fields only if you want to change container.fields */
        },
        xs: {
            width: '560px'
        }
        /* 
        We can create any quantity of break points.

        some_name: {
            width: 'Npx',
            fields: 'N(px|%|rem)',
            offset: 'N(px|%|rem)'
        }
        */
    }
};

gulp.task('smartgrid', function(){
    smartgrid(path +'/scss/', settings);
});

gulp.task('sass', ['smartgrid'], function(){
    gulp.src(path + '/scss/*.scss')
        .pipe(sass().on('error',sass.logError))
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
        .pipe(gulp.dest(path + '/css'));
});

gulp.task('sass:watch', function(){
    gulp.watch('./' + path + '/scss/*.scss', ['sass']);
});