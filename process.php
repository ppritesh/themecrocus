<?php 

	require( 'inc/core-minify.php' );

	if ( isset( $_REQUEST['type'] ) && !empty( $_REQUEST['type'] ) ) {

		$type = $_REQUEST['type'];

		if ( isset( $_REQUEST['content'] ) && !empty( $_REQUEST['content'] ) ) {  
			
			$content = $_REQUEST['content'];
			
			if ( $type == "css" ) {

				$data = minify_css($content);
				echo trim($data);

			} else if ( $type == "html" ) {

				$data = minify_html($content);
				echo trim($data);

			} else if ( $type == "js" ) { 

				$data = minify_js($content);
				echo trim($data);

			} else {

				header("Location: index.php");

			}

		}

	}	