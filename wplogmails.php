<?php

/* 
Plugin Name: WP Log Mails
 */

add_filter('wp_mail', 'wplogmails_wp_mail');

function wplogmails_wp_mail($args) {

	date_default_timezone_set('Europe/Warsaw');
	$date = date('l jS F Y h:i:s A');
	
	$mail = "
===============================================================================
To: %s
Subject: %s
Date: %s

Message: %s

		";
	
	$mail_formatted = sprintf($mail, $args['to'], $args['subject'], $date, $args['message']);
	
	$file = __DIR__ . '/mails.log';
	
	$fp = fopen($file, 'a');
	
	fwrite($fp, $mail_formatted);
	
	fclose($fp);
	
	
	return $args;
	
}

