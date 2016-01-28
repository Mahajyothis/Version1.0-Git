<?php
//require_once 'whatsprot.class.php';
require_once 'vendor/autoload.php';
$username = "918792637596"; //Mobile Phone prefixed with country code so for india it will be 91xxxxxxxx
$password = "e7C+xS4MYTMzuieCZW0Wgw+DHxg=";
 
$w = new WhatsProt($username, 0, "WhatsApp Messaging", true); //Name your application by replacing "WhatsApp Messaging"
$w->connect();
$w->loginWithPassword($password);
 
$target = '919946372766'; //Target Phone,reciever phone
$message = 'Test application by Abhi !';
$image = 'img/crazy.jpg';
$audio = 'media/09 - Ennu Ninte Moideen - Mukkathe Penne [Maango.me].mp3';
 
$w->SendPresenceSubscription($target); //Let us first send presence to user
//$w->sendMessage($target,$message ); // Send Message

if(!empty($image)) $w->sendBroadcastImage($target,$image,false,0,"",'Image Test') ); // Send Message
if(!empty($audio)) $w->sendMessageAudio($target,$audio,false,0,"",'Audio Test' ); // Send Message

//$w->pollMessage();

