<?php
require __DIR__ . '/autoload.php';
use "escpos-php/src/Mike42/Escpos/Printer";
use "escpos-php/src/Mike42/Escpos/PrintConnectors/FilePrintConnector";
$connector = new FilePrintConnector("/dev/ttyUSB0");
$printer = new Printer($connector);

/* Print some bold text */
$printer -> setEmphasis(true);
$printer -> text("FOO CORP Ltd.\n");
$printer -> setEmphasis(false);
$printer -> feed();
$printer -> text("Receipt for whatever\n");
$printer -> feed(4);

/* Bar-code at the end */
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> barcode("987654321");
$printer -> cut();
?>
