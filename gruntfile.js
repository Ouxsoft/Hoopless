// load grunt
module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // scss -> css
    sass: {
      dist: {
        options: {
          sourcemap: 'none'
        },
        files: {
          'resources/themes/mrheroux/stylesheets/top.min.css': 'resources/themes/mrheroux/stylesheets/top.scss'
        }
      }
    },
    // css-minify CSS output
    cssmin: {
      // clean-css options for little whitespace
      options: {
        format: {
          breaks: {
            afterAtRule: false,
            afterBlockBegins: false,
            afterBlockEnds: false,
            afterComment: false,
            afterProperty: false,
            afterRuleBegins: false,
            afterRuleEnds: false,
            beforeBlockEnds: false,
            betweenSelectors: false
          },
          indentBy: 0,
          indentWith: 'space',
          spaces: {
            aroundSelectorRelation: false,
            beforeBlockBegins: false,
            beforeValue: false,
          },
          wrapAt: false
        },
      },
      target: {
        files: [{
          src: 'resources/themes/mrheroux/stylesheets/top.min.css',          
	dest: 'resources/themes/mrheroux/stylesheets/top.min.css',
        }]
      }
    },
    // uglify - combined multiple js files into one
    uglify: {
      build: {
        options : {
          sourceMap : true,
          sourceMapName : 'sourceMap.map'
        },
        src : [
          'resources/themes/mrheroux/scripts/jquery/*.js',
	  'resources/themes/mrheroux/scripts/bootstrap-4.0.0/bootstrap.js'
	 
        ],
        dest : 'resources/themes/mrheroux/scripts/script.min.js'
      }
    },
    // compile when tasks are completed using watch plugin
    watch: {
      css: {
        files: [
	  'resources/themes/mrheroux/stylesheets/*.scss',
	  'resources/themes/mrheroux/stylesheets/**/*.scss'
	],
        tasks: ['sass', 'cssmin']
      },
      js: {
        files: [
          'resources/themes/mrheroux/scripts/*.js',
        ],
        tasks: ['uglify']
      }
    }
  });
  // load grunt plugins
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // register grun tasks
  grunt.registerTask('default', ['watch']);
};

