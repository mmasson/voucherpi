# voucherpi
These scripts will run on a Raspberry Pi.  
When the button is pressed it creates a voucher on a Unifi controller and prints it on the thermal printer.

Includes these projects:
* mike42/escpos-php : https://github.com/mike42/escpos-php
* Art-of-WiFi/UniFi-API-client : https://github.com/Art-of-WiFi/UniFi-API-client

# Configuration on the raspberry pi
1. Put the files in /home/pi/voucherpi
2. Copy config-default.php to config.php and input you settings in it.
3. Update the GPIOs numbers in the button.sh file to match your connections.
4. Add 'sh /home/pi/voucherpi/button.sh' to '/etc/rc.local'.
5. Reboot.
