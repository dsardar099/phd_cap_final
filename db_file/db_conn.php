<?php
	error_reporting(0);
    $con = mysqli_connect("localhost","root","","phd") or die(show_error());
	
	function show_error(){
		echo "Some problem occured..! Refresh the page";
	}
    
?>