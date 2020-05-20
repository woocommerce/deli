/* jshint node:true */
module.exports = function( grunt ) {
	'use strict';

	grunt.initConfig({
		// Compile all .scss files.
		sass: {
			dist: {
				options: {
					require: 'susy',
					sourcemap: 'none',
					includePaths: ['node_modules/susy/sass'].concat( require( 'node-bourbon' ).includePaths )
				},
				files: [{
					'style.css': 'style.scss'
				}]
			}
		},

		// Watch changes for assets.
		watch: {
			css: {
				files: [
					'style.scss'
				],
				tasks: [
					'sass'
				]
			}
		},

		// RTLCSS
		rtlcss: {
			options: {
				config: {
					swapLeftRightInUrl: false,
					swapLtrRtlInUrl: false,
					autoRename: false,
					preserveDirectives: true
				}
			},
			main: {
				expand: true,
				ext: '-rtl.css',
				src: [
					'style.css'
				]
			}
		},

		// Generate POT files.
		makepot: {
			options: {
				type: 'wp-theme',
				domainPath: 'languages',
				potHeaders: {
					'report-msgid-bugs-to': 'https://github.com/woocommerce/deli/issues',
					'language-team': 'LANGUAGE <EMAIL@ADDRESS>'
				}
			},
			frontend: {
				options: {
					potFilename: 'deli.pot',
					exclude: [
						'deli/.*' // Exclude deploy directory
					]
				}
			}
		},

		// Creates deploy-able theme
		copy: {
			deploy: {
				src: [
					'**',
					'.htaccess',
					'!.*',
					'!.*/**',
					'!*.md',
					'!*.scss',
					'!.DS_Store',
					'!assets/css/**/*.scss',
					'!assets/css/sass/**',
					'!assets/js/src/**',
					'!composer.json',
					'!composer.lock',
					'!Gruntfile.js',
					'!node_modules/**',
					'!npm-debug.log',
					'!package.json',
					'!package-lock.json',
					'!phpcs.xml',
					'!deli/**',
					'!deli.zip',
					'!vendor/**'
				],
				dest: 'deli',
				expand: true,
				dot: true
			}
		},

		compress: {
			zip: {
				options: {
					archive: './deli.zip',
					mode: 'zip'
				},
				files: [
					{ src: './deli/**' }
				]
			}
		}		

	});

	// Load NPM tasks to be used here
	grunt.loadNpmTasks( 'grunt-sass' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-rtlcss' );
	grunt.loadNpmTasks( 'grunt-wp-i18n' );
	grunt.loadNpmTasks( 'grunt-contrib-copy' );
	grunt.loadNpmTasks( 'grunt-contrib-compress' );

	// Register tasks
	grunt.registerTask( 'default', [
		'css',
	]);

	grunt.registerTask( 'css', [
		'sass',
		'rtlcss'
	] );

	grunt.registerTask( 'dev', [
		'default',
		'makepot'
	] );

	grunt.registerTask( 'deploy', [
		'dev',
		'copy',
		'compress'
	] );
};