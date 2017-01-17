'use_strict';

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
          outFile: '<%= project.build %>/styles.css',
          sourceMap: true
        },
        files: {
            "<%= project.build %>/styles.css": "<%= project.css %>/styles.{sass,scss}"
        }
      },
      build: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
            "<%= project.build %>/styles.css": "<%= project.css %>/styles.{sass,scss}"
        }
      }
    },
    // Coffeescript -> JS
    // Concats and compiles all coffeescript files into one app.js file
    coffee: {
      dev: {
        options: {
          bare: true,
          sourceMap: true
        },
        expand: true,
        ext: '.js',
        flatten: false,
        files: {
          '<%= project.build %>/scripts/app.js': ['<%= project.scripts %>/app.coffee', '<%= project.scripts %>/factory.coffee', '<%= project.scripts %>/root-ctrl.coffee', '<%= project.components %>/**/*.coffee']
        }
      },
      build: {
        options: {
          bare: true,
          sourceMap: false
        },
        expand: true,
        flatten: false,
        ext: '.js',
        files: {
          '<%= project.build %>/scripts/app.js': ['<%= project.js %>/app.coffee', '<%= project.js %>/factory.coffee', '<%= project.js %>/root-ctrl.coffee', '<%= project.components %>/**/*.coffee']
        }
      }
    },
    // JS Error checking
    jshint: {
      all: [
        '<%= project.build %>/{scripts}/app.js'
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
      coffee:{
        options:{
          title: "Grunt",
          message: "Coffeescript Compiled Successfully.",
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
          'assets/**/*',
          'images/**/*',
          '**/*.{php,html}'
        ],
        dest: '<%= project.build %>/',
      }
    },
    sync: {
      php: {
        files: [{
          cwd: '<%= project.app %>/', 
          src: ['**/*.{php,html}'],
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
    bower: {
      dev: {
        dest: 'build/scripts/vendor'
      }
    },
    watch: {
      sass: {
        files: ['<%= project.css %>/**/*.{scss,sass}','<%= project.components %>/**/*.{scss,sass}'],
        tasks: ['sass:dev','autoprefixer','notify:sass']
      },
      coffee: {
        files: ['<%= project.scripts %>/**/*.{coffee,litcoffee}', '<%= project.components %>/**/*.{coffee,litcoffee}'],
        tasks: ['coffee:dev', 'newer:jshint', 'notify:coffee']
      },
      // Sync tasks for PHP and Images
      php: {
        files: ['<%= project.app %>/**/*.php'],
        tasks: ['sync:php', 'notify:php']
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
              '<%= project.build %>/scripts/**/*.js',
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
    'bower',
    'copy:main',
    'sass:dev',
    'autoprefixer',
    'coffee:dev',
    'jshint',
    'php',
    'browserSync:dev',
    'watch'
  ]);
  grunt.registerTask('build', [
    'clean',
    'bower',
    'copy:main',
    'sass:build',
    'autoprefixer',
    'coffee:build',
    'jshint'
  ]);
};