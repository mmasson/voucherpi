<?php
require __DIR__ . '/escpos-php/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

require_once('UniFi-API-client/src/Client.php');
require_once('config.php');

$connector = new FilePrintConnector("php://stdout");
$printer = new Printer($connector);

$voucher_count = 1; // We only print one voucher

$unifi_connection = new UniFi_API\Client($controlleruser, $controllerpassword, $controllerurl, $site_id, $controllerversion);
$set_debug_mode   = $unifi_connection->set_debug($debug);
$loginresults     = $unifi_connection->login();

/** FROM UNIFI DOCUMENTATION */
/**
 * Create voucher(s)
 * -----------------
 * returns an array containing a single object which contains the create_time(stamp) of the voucher(s) created
 * required parameter <minutes> = minutes the voucher is valid after activation (expiration time)
 * optional parameter <count>   = number of vouchers to create, default value is 1
 * optional parameter <quota>   = single-use or multi-use vouchers, value '0' is for multi-use, '1' is for single-use,
 *                                'n' is for multi-use n times
 * optional parameter <note>    = note text to add to voucher when printing
 * optional parameter <up>      = upload speed limit in kbps
 * optional parameter <down>    = download speed limit in kbps
 * optional parameter <MBytes>  = data transfer limit in MB
 *
 * NOTES: please use the stat_voucher() method/function to retrieve the newly created voucher(s) by create_time
*/

$voucher_result = $unifi_connection->create_voucher($voucher_expiration, $voucher_count,0,'Reception',$voucher_upload_speed,$voucher_download_speed);
$vouchers = $unifi_connection->stat_voucher($voucher_result[0]->create_time);

#print_r($voucher);


$printer -> initialize();
$printer -> text("\n");
$printer -> setTextSize(2,2);
$printer -> setEmphasis(true);
$printer -> text(" ".$voucher_company."\n");
$printer -> setEmphasis(false);
$printer -> setTextSize(1,1);
$printer -> text($voucher_msg1."\n");
$printer -> text($voucher_msg2."\n");
$printer -> text("\n");
$printer -> text("  ".$voucher_valid.($vouchers[0]->duration/60)."h.\n");
$printer -> setTextSize(3,3);
$printer -> setEmphasis(true);
$printer -> text($vouchers[0]->code);
$printer -> setEmphasis(false);
$printer -> text("\n");
$printer -> setTextSize(1,1);
$printer -> setEmphasis(true);
$printer -> text("  SSID: ");
$printer -> setEmphasis(false);
$printer -> text($voucher_ssid."\n");
$printer -> setEmphasis(true);
$printer -> text("  Upload speed:");
$printer -> setEmphasis(false);
$printer -> text("    ".($vouchers[0]->qos_rate_max_up/1024)." Mbps \n");
$printer -> setEmphasis(true);
$printer -> text("  Download speed:");
$printer -> setEmphasis(false);
$printer -> text("  ".($vouchers[0]->qos_rate_max_down/1024)." Mbps \n");
$printer -> feed(2);
$printer -> cut();
$printer -> close();

?>
