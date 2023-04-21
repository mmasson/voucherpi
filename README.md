# voucherpi
These scripts will run on a Raspberry Pi.  
When the button is pressed it creates a voucher on a Unifi controller and prints it on the thermal printer.

# Configuration on the raspberry pi
1. Install `php-curl` and `wiringpi` (`apt-get install php-curl wiringpi`) or (`apt-get install php-curl; wget https://github.com/WiringPi/WiringPi/releases/download/2.61-1/wiringpi-2.61-1-armhf.deb; sudo dpkg -i wiringpi-2.61-1-armhf.deb` in more recent distros)
2. Put the files in `/home/pi/voucherpi`
3. Copy `config-default.php` to `config.php` and input you settings in it.
4. Update the GPIOs numbers in the `button.sh` file to match your connections.
5. Add `sh /home/pi/voucherpi/button.sh` to `/etc/rc.local`.
6. Reboot.


# Credits and references:

## Includes and makes use of these projects:
* mike42/escpos-php : https://github.com/mike42/escpos-php
* Art-of-WiFi/UniFi-API-client : https://github.com/Art-of-WiFi/UniFi-API-client

## Based in part on Adafruit's Instant Camera using Raspberry Pi and Thermal Printer project
* https://learn.adafruit.com/instant-camera-using-raspberry-pi-and-thermal-printer/system-setup
