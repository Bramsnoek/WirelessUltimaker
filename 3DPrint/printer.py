import os, sys
import serial
import termios
import time

class Printer:
    """
    This class will be used for all printer related actions.
    The init function will give the class the appropiate values needed for those actions.

    @param comPort: The COM-port thats assigned to the cable attached to your ultimaker. (COMx For Windows) (ttyACMxs linux)
    @param baudRate: The baudRate of the COM-port, standard this is 250000.
    """
    def __init__(self, comPort, baudRate=250000):
        if comPort == '':
            raise ValueError('The COM-port cannot be empty')

        self.comPort = comPort
        self.baudRate = baudRate

    """
    The print function will be used to print an existing Gcode file.

    @param file: The path to the Gcode file.
    """
    def Print(self, file):
        from printrun import gcoder
        from printrun.printcore import printcore

        printer = printcore(self.comPort, self.baudRate)

        time.sleep(2)

        disectedGCode = [i.strip() for i in open(file)]

        disectedGCode = gcoder.LightGCode(disectedGCode)

        printer.startprint(disectedGCode)