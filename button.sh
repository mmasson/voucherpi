#!/bin/bash

SHUTTER=22
LED=23

# Initialize GPIO states
gpio -g mode  $SHUTTER up
gpio -g mode  $LED     out

# Flash LED on startup to indicate ready state
for i in `seq 1 5`;
do
	gpio -g write $LED 0
	sleep 0.2
	gpio -g write $LED 1
	sleep 0.2
done

while :
do
	# Check for shutter button
	if [ $(gpio -g read $SHUTTER) -eq 0 ]; then
		gpio -g write $LED 0
		php /home/pi/voucherpi/create_voucher.php > /dev/ttyUSB0

		sleep 1
		# Wait for user to release button before resuming
		while [ $(gpio -g read $SHUTTER) -eq 0 ]; do continue; done
		gpio -g write $LED 1
	fi

done
