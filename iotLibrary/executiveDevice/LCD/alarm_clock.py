# Simple clock program. Writes the exact time.
# Demo program for the I2C 16x2 Display from Ryanteck.uk
# Created by Matthew Timmons-Brown for The Raspberry Pi Guy YouTube channel

# Import necessary libraries for communication and display use
import lcddriver
import time
import datetime
import sys

import urllib2

# Load the driver and set it to "display"
# If you use something from the driver library use the "display." prefix first
display = lcddriver.lcd()

print len(sys.argv)
print str(sys.argv)



#sys.argv[1] = int(sys.argv[1])
#sys.argv[2] = str(sys.argv[2])



#data = urllib2.urlopen("http://192.168.0.112/www/LCD_data2").read(20000) # read only 20 000 chars
#data = data.split("\n") # then split it into lines

#for line in data:
#    print line

var = 1
oldLine = ""

try:
    while var == 1:


    #    print("Writing to display")
    #    data = urllib2.urlopen("http://192.168.0.112/www/LCD_data").read(20000) # read only 20 000 chars
    #    data = data.split("\n") # then split it into lines
    #    if "text" in data[0]:
    #        if data[1] != oldLine:
    #            display.lcd_clear()
    #        display.lcd_display_string(data[1], 2)
    #        oldLine = data[1]
    #    else:
    #        display.lcd_clear()

        display.lcd_display_string(str(datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")), 1)

        time.sleep(1)


        #display.lcd_display_string("No time to waste", 1) # Write line of text to first line of display
        #while sys.argv[1] > 0:

            #display.lcd_clear()
        #    display.lcd_display_string("alarm za " + str(sys.argv[1]) + " sekund", 1)
        #    sys.argv[1] = sys.argv[1] - 1
        #    #display.lcd_display_string(str(datetime.datetime.now().date()), 1) # Write just the time to the display
        #    #display.lcd_display_string(str(datetime.datetime.now().time()), 2) # Write just the time to the display
        #    display.lcd_display_string(str(datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")), 3) # Write just the time to the display
        #    # Program then loops with no delay (Can be added with a time.sleep)
        #    time.sleep(1)
        #    if sys.argv[1] == 9:
        #        display.lcd_clear()


        #display.lcd_clear()
        #display.lcd_display_string(sys.argv[2], 1)
        #display.lcd_display_string(sys.argv[2], 2)
        ##display.lcd_display_string("spac kurwa mac", 3)
        ##display.lcd_display_string("spac kurwa mac", 4)
        #time.sleep(10)

except KeyboardInterrupt: # If there is a KeyboardInterrupt (when you press ctrl+c), exit the program and cleanup
    print("Cleaning up!")
    display.lcd_clear()
