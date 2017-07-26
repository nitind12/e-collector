<?php	
	$file=$urlPath;
     //   echo $file;
	header('Content-type: application/pdf');
	header('Content-Disposition: inline; filename="the.pdf"');
	@readfile($file);
?>