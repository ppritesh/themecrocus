<?php

require( 'inc/core-minify.php' );


$data = array();
if ( 0 < $_FILES['file']['error'] ) {
	$data['result'] = false;
	$data['msg'] = 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else {
	$filr_content = file_get_contents($_FILES['file']['tmp_name']); 

	switch ( $_FILES['file']['type']) {
		case 'text/html':
			$minify_data = minify_html($filr_content);
			$ext = "html";
			break;
		case  'text/css':
			$minify_data = minify_css($filr_content);
			$ext = "css";
			break;
		case 'application/x-javascript':
			$minify_data = minify_js($filr_content);
			$ext = "js";
			break;

		default:
			$minify_data ="";
		break;
	}

	if(!empty($minify_data))	{
		
		$data['result'] = true;

		$data['content'] = trim($minify_data);

		$data['ext'] = $ext;
		
	}	else {

		$data['result'] = false;

		$data['msg'] = "format not supported.";
	}

}

echo json_encode($data);

?>