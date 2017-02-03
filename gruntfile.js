 module.exports = function(grunt) {

	//config
	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),
		
		//Sass
		sass: {   
			options: {
				sourceMap: true,
				outputStyle: 'compressed'
			},
	        dist: {
	            files: {
	                'public/css/app.css': 'resources/assets/sass/app.scss'
	            }
	        }
	    },
	    //Uglify
	    uglify:{
	    	my_files: {
	    		options: {
	    			sourceMap: true,
	    			sourceMapName: 'public/js/main.min.map',
	    			banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
        					'<%= grunt.template.today("yyyy-mm-dd") %> */'
	    		},
	    		files: {
	    			'public/js/main.min.js': 
	    			[
	    				'resources/assets/js/bootstrap.js',
	    				'resources/assets/js/app.js'
	    			]
	    		}
	    	}
	    },

	    //Imagemin
	    imagemin: {
	    	my_images: {
	    		options: {
	    			progressive: true
	    		},
	    		files: [{
	    			expand: true,
	    			cwd: 'resources/assets/img/',
	    			src: ['*.{png,jpg,gif}'],
	    			dest: 'public/img'
	    		}]
	    	}
	    },
    

	    // Watch
	    watch: {
	    	options: {
	    		livereload: true
	    	},
	    	sass: {
	    		files: 'resources/assets/sass/*.scss',
	    		tasks: 'css'
	    	},
	    	sprite: {
	    		files: 'resources/assets/img/sprite/*.png',
	    		tasks:'sprite'
	    	},
	    	js: {
	    		files: 'resources/assets/js/main.js',
	    		tasks: 'js'
	    	}
	    },

 		sprite:{
	      	all: {
		        src: 'resources/assets/img/sprites/*.png',
		        dest: 'public/img/sprite.png',
		        destCss: 'resources/assets/scss/_sprites.scss',
		        cssFormat: 'scss',
		        cssTemplate: 'resources/assets/scss/icons.mustache'
	    	}
    	},
	});

	//Load plugins
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-spritesmith');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-imagemin');


	//Tasks
	grunt.registerTask('css', ['sass']);
	grunt.registerTask('js', ['jshint:all', 'uglify']);
	grunt.registerTask('live', ['watch']);
	grunt.registerTask('images', ['imagemin', 'sprite']);	

};