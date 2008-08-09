<?php
/**
 * Random sayings of gsnedders
 *
 * Gives you a random bit of what is probably not wisdom!
 *
 * Usage: <?php $theme->sneddy_quote(); ?> to show the random quote. A sample
 * template.php template is included with the plugin. This can be copied to
 * your active theme and modified.
 **/

class sneddy_quote extends Plugin
{
	/**
	 * Required plugin information
	 * @return array The array of information
	 **/
	public function info()
	{
		return array(
			'name' => 'gsnedders sayings',
			'version' => '1.0',
			'url' => 'http://hg.gsnedders.com/sneddy_quote/',
			'author' => 'Geoffrey Sneddon',
			'authorurl' => 'http://gsnedders.com/',
			'license' => 'Apache License 2.0',
			'description' => 'Gives you a random quote which is probably not wisdom!',
			'copyright' => '2008'
		);
	}
	
	/**
	 * Make a quote available to the theme
	 */
	public function theme_sneddy_quote( $theme )
	{
		// Get all the quotes
		static $quotes;
		if ( ! $quotes ) {
			$quotes = file('quotes.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		}
		
		// Get a random one
		$theme->quote = $quotes[array_rand($quotes)];
	}

	/**
	 * On plugin init, add the template included with this plugin to the available templates in the theme
	 */
	public function action_init()
	{
		$this->add_template( 'sneddy_quote', dirname( __FILE__ ) . '/template.php' );
	}
}

?>