<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class PHPMailer_Lib{
	public function __construct(){
		log_message('Debug','PHPMailer class is loaded');
	}

	public function load(){
		require_once APPPATH.'third_party/PHPMailer/Exception.php';
		require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
		require_once APPPATH.'third_party/PHPMailer/SMTP.php';
		//require_once APPPATH.'third_party/PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;
		return $mail;
	}
}