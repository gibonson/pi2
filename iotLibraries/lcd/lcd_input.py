#!/usr/bin/env python

# Simple string program. Writes and updates strings.
# Demo program for the I2C 16x2 Display from Ryanteck.uk
# Created by Matthew Timmons-Brown for The Raspberry Pi Guy YouTube channel

# Import necessary libraries for communication and display use
import lcddriver
import time
import sys

# Load the driver and set it to "display"
# If you use something from the driver library use the "display." prefix first
display = lcddriver.lcd()


print 'Number of arguments:', len(sys.argv), 'arguments.'
print 'Argument List:', str(sys.argv)

text1 = sys.argv[1]
text2 = sys.argv[2]

try:
    #while True:
        # Remember that your sentences can only be 16 characters long!
	display.lcd_clear()
        print(sys.argv[1])
        display.lcd_display_string(text1, 1) 	# Write line of text to first line of display
        display.lcd_display_string(text2, 2) # Write line of text to second line of display
        time.sleep(2)                                     # Give time for the message to be read
        #display.lcd_display_string("I am a display!", 1)  # Refresh the first line of display with a different message
        #time.sleep(2)                                     # Give time for the message to be read
        #display.lcd_clear()                               # Clear the display of any data
        #time.sleep(2)                                     # Give time for the message to be read

except KeyboardInterrupt: # If there is a KeyboardInterrupt (when you press ctrl+c), exit the program and cleanup
    print("Cleaning up!")
    display.lcd_clear()
