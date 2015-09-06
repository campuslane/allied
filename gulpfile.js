var elixir = require('laravel-elixir');

/*
 |----------------------------------------------------------------
 | Have a Drink
 |----------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic
 | Gulp tasks for your Laravel application. Elixir supports
 | several common CSS, JavaScript and even testing tools!
 |
 */

elixir.config.assetsPath = './wp-content/themes/allied/';

elixir(function(mix) {

	mix.scripts([
		'./bower_components/bootstrap/dist/js/bootstrap.min.js'
	], 'wp-content/themes/allied/js/app.js');

	mix.less('theme.less', 'wp-content/themes/allied/css/theme.css');
    
    
});