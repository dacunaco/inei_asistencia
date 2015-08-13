module.exports = function(grunt) {

  grunt.initConfig({
    outdir: 'public/dist/',
    indir: 'public/src/',
    ngAnnotate: {
        options: {
            singleQuotes: true,
        },
        dist: {
          files: [{
            src: 'public/assets/js/*.js',
            dest: '<%= indir %>scripts.min.js'
          },{
            src: 'public/controllers/*.js',
            dest: '<%= indir %>controllers.min.js'
          },{
            src: 'public/controllers/service/*.js',
            dest: '<%= indir %>services.min.js'
          },{
            src: 'public/controllers/auxiliar/*.js',
            dest: '<%= indir %>auxiliars.min.js'
          }]
        }
    },
    uglify: {
      options: {
        mangle: true
      },
      my_target: {
        files: {
          '<%= outdir %>scripts.min.js': ['<%= indir %>scripts.min.js'],
          '<%= outdir %>controllers.min.js' : ['<%= indir %>controllers.min.js'],
          '<%= outdir %>services.min.js' : ['<%= indir %>services.min.js'],
          '<%= outdir %>auxiliars.min.js' : ['<%= indir %>auxiliars.min.js']
        }
      }
    },
    jshint: {
      options: {
        reporter: require('jshint-stylish')
      },
      all: {
        src: [
          'public/controllers/{,*/}*.js'
        ]
      },
    },
    //htmlmin: {
      //dist: {
       //options: {
          //collapseWhitespace: true,
          //conservativeCollapse: true,
          //collapseBooleanAttributes: true,
          //removeCommentsFromCDATA: true,
          //removeOptionalTags: true
        //},
        //files: [{
          //expand: true,
          //src: ['*.html', 'public/views/{,*/}*.html'],
          //dest: '<%= outdir %>views'
        //}]
      //}
    //}
  });

  grunt.loadNpmTasks('grunt-ng-annotate');

  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.loadNpmTasks('grunt-contrib-jshint');

  grunt.loadNpmTasks('grunt-contrib-htmlmin');

  grunt.registerTask('default', ['jshint', 'ngAnnotate', 'uglify']);

};