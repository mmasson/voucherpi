<?php
/**
 * Rename this file to config.php and update the sections below with your configuration details
 */


/**
 * Controller configuration
 * ===============================
 */
$controlleruser     = 'UNIFIUSERNAME'; // the user name for access to the UniFi Controller
$controllerpassword = 'UNIFIPASSWORD'; // the password for access to the UniFi Controller
$controllerurl      = 'https://UNIFICONTROLLER:8443'; // full url to the UniFi Controller, eg. 'https://22.22.11.11:8443'
$controllerversion  = '5.10.23'; // the version of the Controller software, eg. '4.6.6' (must be at least 4.0.0)

/**
 * Vouchers configuration
 * =============================
 */
$voucher_upload_speed = 10*1024; // 10 mbps
$voucher_download_speed = 10*1024; // 10 mbps
$voucher_expiration = 1440; // 1 day
$site_id = 'default'; // default value


$voucher_company = "YOUR COMPANY";
$voucher_msg1    = "   Guest wifi network access.";
$voucher_msg2    = "   Welcome and enjoy.";
$voucher_valid   = "Valide pour / Valid for";
$voucher_ssid    = "COMPANY Guests SSID";

/**
 * set to true (without quotes) to enable debug output to the browser and the PHP error log
 */
$debug = false;
