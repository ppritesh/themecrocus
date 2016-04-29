<?php
    if(!empty($_POST))  {

        // file extenstion
        $ext =  $_POST["ext"];

        // for get timestamp 
        $t=time();

        // set unique file name for unique downlod
        $filename = "tempfile/themecrocus_".$t.".".$ext;

        // create new file on server
        $handle = fopen($filename, "w");
        fwrite($handle, $_POST["content"]);
        fclose($handle);

        // logic for download file
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($filename));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        readfile($filename);
        exit;
        
    }   else {

        // redirect to home page
        header("location:index.php", flase);

    }
?>