<?php

// Your Email Address
$toaddress = "screamcomunicacao@terra.com.br";

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
//                         Please do not replace                       //
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
$fromname = $_POST['name'] . ' ' . $_POST['surname'];
$fromaddress = $_POST['posta'];

if ($_POST['subject'] == 0) {
	$subject = 'Feedback';
} elseif ($_POST['subject'] == 1) {
	$subject = 'Suggestion';
} elseif ($_POST['subject'] == 2) {
	$subject = 'Registration';
} elseif ($_POST['subject'] == 3) {
	$subject = 'Other';
}

$message = nl2br($_POST['message']);

$mailcontent = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n"
			  ."<html dir=\"ltr\" lang=\"tr\">\n"
			  ."<head>\n"
			  ."<title>".$subject."</title>\n"
			  ."<META HTTP-EQUIV=\"Pragma\" CONTENT=\"no-cache\" />\n"
			  ."<META HTTP-EQUIV=\"Expires\" CONTENT=\"-1\" />\n"
			  ."<META HTTP-EQUIV=\"Cache-Control\" CONTENT=\"no-cache\" />\n"
			  ."<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html; charset=utf-8\" />\n"
			  ."<style type=\"text/css\" media=\"all\">\n"
			  ."body\n"
			  ."{\n"
			  ."	color: #333333;\n"
			  ."	font-size: 12px;\n"
			  ."	font-family: Century Gothic, Trebuchet MS, Tahoma, verdana, arial, Helvetica, sans-serif;\n"
			  ."	margin: 2ex;\n"
			  ."	text-align: left;\n"
			  ."	background-color: #FFFFFF;\n"
			  ."}\n"
			  ."\n"
			  ."a:link, a:visited\n"
			  ."{\n"
			  ."	color: #FF6600;\n"
			  ."	text-decoration: none;\n"
			  ."	font-weight: bold;\n"
			  ."	font-size: 12px;\n"
			  ."	font-family: Century Gothic, Trebuchet MS, Tahoma, verdana, arial, Helvetica, sans-serif;\n"
			  ."}\n"
			  ."\n"
			  ."a:hover\n"
			  ."{\n"
			  ."	color: #336699;\n"
			  ."	text-decoration: none;\n"
			  ."	font-weight: bold;\n"
			  ."	font-size: 12px;\n"
			  ."	font-family: Century Gothic, Trebuchet MS, Tahoma, verdana, arial, Helvetica, sans-serif;\n"
			  ."}\n"
			  ."\n"
			  ."</style>\n"
			  ."</head>\n"
			  ."<body>\n"
			  ."\n"
			  ."".$message."\n"
			  ."\n"
			  ."</BODY>\n"
			  ."</HTML>\n";

$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=utf-8\n";
$headers .= "X-Priority: 3\n";
$headers .= "X-MSMail-Priority: Normal\n";
$headers .= "X-Mailer: Eggdrop Inc.\n";
$headers .= "From: \"".$fromname."\" <".$fromaddress.">\n";

@mail($toaddress, $subject, $mailcontent, $headers);

?>
