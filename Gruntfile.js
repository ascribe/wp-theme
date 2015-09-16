module.exports = function( grunt ) {

	// Project configuration
	grunt.initConfig( {
		pkg:    grunt.file.readJSON( 'package.json' ),
		concat: {
			options: {
				stripBanners: true
			},
			main: {
				src: [
                    'assets/js/vendor/*/*.min.js',
                    'assets/js/vendor/*/*.js',
					'assets/js/src/ascribeio.js'
				],
				dest: 'assets/js/ascribeio.js'
			}
		},
		jshint: {
			all: [
				'Gruntfile.js',
				'assets/js/src/**/*.js',
				'assets/js/test/**/*.js'
			]
		},
		uglify: {
			all: {
				files: {
					'assets/js/ascribeio.min.js': ['assets/js/ascribeio.js']
				},
				options: {
					mangle: {
						except: ['jQuery']
					}
				}
			}
		},

        less:   {
            all: {
                options: {
                    sourceMap: false
                },
                files: {
                    'assets/css/ascribeio.css': 'assets/css/less/ascribeio.less'
                }
            }
        },
		
		
		postcss: {
			dist: {
				options: {
					processors: [
						require('autoprefixer-core')({browsers: 'last 2 versions'})
					]
				},
				files: { 
					'assets/css/ascribeio.css': [ 'assets/css/ascribeio.css' ]
				}
			}
		},
		
		cssmin: {
			minify: {
				expand: true,

				cwd: 'assets/css/',
				src: ['ascribeio.css'],

				dest: 'assets/css/',
				ext: '.min.css'
			}
		},
		watch:  {
			livereload: {
				files: ['assets/css/*.css'],
				options: {
					livereload: true
				}
			},
			styles: { 
				files: ['assets/css/less/**/*.less'],
				tasks: ['less', 'autoprefixer', 'cssmin'],
				options: {
					debounceDelay: 500
				}
			},
			scripts: {
				files: ['assets/js/src/**/*.js', 'assets/js/vendor/**/*.js'],
				tasks: ['jshint', 'concat', 'uglify'],
				options: {
					debounceDelay: 500
				}
			}
		},
        'sftp-deploy': {
            build: {
                auth: {
                    host: 'server.territorial.ca',
                    port: 22,
                    authKey: 'key1'
                },
                cache: 'sftpCache.json',
                src: '/Users/sarahetter/Dropbox/_shared/sarahetter/ascribe/',
                dest: '/home/ascribe/public_html/wp-content/themes/ascribe/',
                exclusions: ['/Users/sarahetter/Dropbox/_shared/sarahetter/ascribe/node_modules',
                    '/Users/sarahetter/Dropbox/_shared/sarahetter/ascribe/release',
                    '/Users/sarahetter/Dropbox/_shared/sarahetter/ascribe/vendor',
                    '/Users/sarahetter/Dropbox/_shared/sarahetter/ascribe/.git',
                    '/Users/sarahetter/Dropbox/_shared/sarahetter/ascribe/.idea',
                    '/Users/sarahetter/Dropbox/_shared/sarahetter/ascribe/**/.DS_Store'],
                serverSep: '/',
                concurrency: 4,
                progress: true
            },
            css: {
                auth: {
                    host: 'server.territorial.ca',
                    port: 22,
                    authKey: 'key1'
                },
                cache: 'sftpCache.json',
                src: '/Users/sarahetter/Dropbox/_shared/sarahetter/ascribe/assets/css/',
                dest: '/home/ascribe/public_html/wp-content/themes/territorial/assets/css',
                serverSep: '/',
                concurrency: 4,
                progress: true
            },
            js: {
                auth: {
                    host: 'server.territorial.ca',
                    port: 22,
                    authKey: 'key1'
                },
                cache: 'sftpCache.json',
                src: '/Users/sarahetter/Dropbox/_shared/sarahetter/ascribe/assets/js/',
                dest: '/home/ascribe/public_html/wp-content/themes/territorial/assets/js',
                serverSep: '/',
                concurrency: 4,
                progress: true
            },
            controller: {
                auth: {
                    host: 'server.territorial.ca',
                    port: 22,
                    authKey: 'key1'
                },
                src: '/Users/sarahetter/Dropbox/_shared/sarahetter/ascribe/controller/',
                dest: '/home/ascribe/public_html/wp-content/themes/territorial/controller/',
                serverSep: '/',
                concurrency: 4,
                progress: true
            }
        }
	} );

	// Load tasks
	require('load-grunt-tasks')(grunt);

	// Register tasks
	
	grunt.registerTask( 'css', ['less', 'postcss', 'cssmin', 'sftp-deploy:css'] );

	grunt.registerTask( 'js', ['jshint', 'concat', 'uglify', 'sftp-deploy:js'] );

    grunt.registerTask( 'controller', ['sftp-deploy:controller'] );

    grunt.registerTask( 'default', ['css', 'js', 'controller'] );

	grunt.util.linefeed = '\n';
};
