"use strict";

module.exports = function( grunt ) {

  require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

  grunt.initConfig({

    // configuracoes das tarefas

    watch: {
      css: {
        files: '../assets/sass/**/*' ,
        tasks: [ 'compass' ]
      },
      js: {
        files: '../assets/js/**/*',
        tasks: [ 'uglify' ]
      }
    },
    // Compile scss
    compass: {
      dist: {
        options: {
          /*force: true,
          config: '../assets/config.rb',
          outputStyle: 'compressed'*/
          httpPath: 'fakepath/../../', /* SEMPRE ALTERAR */
          sassDir: '../assets/sass',
          cssDir: '../assets/css',
          imagesDir: '../assets/img',
          boring: false,
          outputStyle: 'compressed',
        }
      }
    },

    // Concat and minify javascripts
    uglify: {
      options: {
        mangle: false
      },
      dist: {
        files: {
          '../assets/min/jquery.suiting.min.js': [
            '../assets/js/jquery.suiting.js'
          ],
          '../assets/min/jquery.mobile.min.js': [
            '../assets/js/jquery.mobile.js'
          ],
          '../assets/min/jquery.main.min.js': [
            '../assets/js/jquery.main.js'
          ],
          '../assets/min/jquery.placeholder.min.js': [
            '../assets/js/jquery.placeholder.js'
          ],
          '../assets/min/jquery.validate.messages.min.js': [
            '../assets/js/jquery.validate.messages.js'
          ]
        }
      }
    },

  });

  // registrando tarefas
  grunt.registerTask( 'default', [ 'watch' ] );

};