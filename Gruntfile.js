'use strict';

module.exports = function(grunt) {
  require('load-grunt-tasks')(grunt);

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    project: {
      app: ['./source'],
      build: ['./build'],
      css: ['<%= project.app %>/styles'],
      scripts: ['<%= project.app %>/scripts'],
      components: ['<%= project.app %>/modules']
    },
    // Sass -> CSS
    sass: {
      dev: {
        options: {
          outputStyle: 'expanded',
          sourceMap: true
        },
        files: {
            "<%= project.build %>/styles.css": "<%= project.css %>/styles.{sass,scss}"
        }
      },
      build: {
        options: {
          outputStyle: 'compressed',
          sourceMap: false,
          sourceMapEmbed: false
        },
        files: {
            "<%= project.build %>/styles.css": "<%= project.css %>/styles.{sass,scss}"
        }
      }
    },
    // JS Error checking
    jshint: {
      all: [
        '<%= project.app %>/{scripts,modules}/**/*.js',
        '!<%= project.app %>/{scripts,modules}/vendor/*.js',
      ],
      options: {
        jshintrc: '<%= project.app %>/.jshintrc',
        reporter: require('jshint-stylish')
      }
    },
    // Adds any relevate autoprefixers supporting IE 11 and above
    autoprefixer: {
      options: {
        browsers: ["> 1%", "ie > 10"],
        map: true
      },
      target: {
        files: {
          "<%= project.build %>/styles.css": "<%= project.build %>/styles.css"
        }
      }
    },
    notify: {
      sass:{
        options:{
          title: "Grunt",
          message: "Sass Compiled Successfully.",
          duration: 2,
          max_jshint_notifications: 1
        }
      },
      php:{
        options:{
          title: "Grunt",
          message: "PHP Updated Successfully.",
          duration: 2,
          max_jshint_notifications: 1
        }
      },
      images:{
        options:{
          title: "Grunt",
          message: "Images Copied Successfully.",
          duration: 2,
          max_jshint_notifications: 1
        }
      },
      js:{
        options:{
          title: "Grunt",
          message: "Javascript Updated Successfully.",
          duration: 2,
          max_jshint_notifications: 1
        }
      }
    },
    // Copies remaining files to places other tasks can use
    copy: {
      main: {
        expand: true,
        cwd: '<%= project.app %>/',
        src: [
          '*.{ico,png,txt}',
          '.htaccess',
          '{scripts,modules}/**/*.js',
          'assets/**/*',
          'images/**/*',
          '**/*.php'
        ],
        dest: '<%= project.build %>/',
      }
    },
    sync: {
      php: {
        files: [{
          cwd: '<%= project.app %>/', 
          src: ['**/*.php'],
          dest: '<%= project.build %>/'
        }],
      },
      js: {
        files: [{
          cwd: '<%= project.app %>/',
          src: ['{scripts,modules}/**/*.js'],
          dest: '<%= project.build %>/'
        }],
      },
      images: {
        files: [{
          cwd: '<%= project.app %>/', 
          src: ['assets/**/*', '*.{ico,png,txt}'],
          dest: '<%= project.build %>/'
        }],
      }
    },
    // Empties folders to start fresh
    clean: {
      main: {
        files: [{
          dot: true,
          src: [
            '<%= project.build %>/{,*/}*'
          ]
        }]
      }
    },
    watch: {
      sass: {
        files: ['<%= project.css %>/**/*.{scss,sass}','<%= project.components %>/**/*.{scss,sass}'],
        tasks: ['sass:dev','autoprefixer','notify:sass']
      },
      // Sync tasks for PHP and Images
      php: {
        files: ['<%= project.app %>/**/*.php'],
        tasks: ['sync:php', 'notify:php']
      },
      js: {
        files: ['<%= project.app %>/{scripts,modules}/**/*.js'],
        tasks: ['jshint:dev', 'sync:js', 'notify:js']
      },
      images: {
        files: ['<%= project.app %>/assets/**/*'],
        tasks: ['sync:images', 'notify:images']
      },
      gruntfile: {
        files: ['Gruntfile.js']
      }
    },
    // Server setup
    php: {
      dev: {
        options: {
          base: 'build',
          port: 8888,
          open: false,
          keepalive: false,
          silent: true
        }
      }
    },
    browserSync: {
      dev: {
        bsFiles: {
          src : [
              '<%= project.build %>/styles.css',
              '<%= project.build %>/{scripts,modules}/*.js',
              '<%= project.build %>/**/*.{png,jpg,jpeg,gif,webp,svg}',
              '<%= project.build %>/**/*.{php,html}'
          ]
        },
        options: {
          proxy: 'localhost:<%= php.dev.options.port %>', //our PHP server
          port: 9000,
          watchTask: true,
          notify: true,
          open: true,
          logLevel: 'info',
          ghostMode: {
            clicks: true,
            scroll: true,
            links: true,
            forms: true
          }
        }
      }
    }
  });
  
  // Default task(s).
  grunt.registerTask('default', [
    'clean',
    'jshint',
    'copy:main',
    'sass:dev',
    'autoprefixer',
    'php',
    'browserSync:dev',
    'watch'
  ]);
  grunt.registerTask('build', [
    'clean',
    'jshint',
    'copy:main',
    'sass:build',
    'autoprefixer'
  ]);
};