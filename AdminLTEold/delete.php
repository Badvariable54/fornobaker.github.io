<?php
$connection=mysqli_connect("localhost","root","","forno");
$q = "DELETE FROM faq WHERE faq_id='$_GET[faqid]'";
if(mysqli_query($connection,$q))
	header("refresh:1; url=faq_table.php");
else
	echo "Not delete data";
?>