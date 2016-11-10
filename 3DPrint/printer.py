import os, sys

class Printer:
    """
    This class will be used for al printer related actions.
    The init function will give the class the appropiate values needed for those actions.

    @param comPort: The COM-port thats assigned to the cable attached to your ultimaker. (COMx For Windows) (ttySx linux)
    @param baudRate: The baudRate of the COM-port, standard this is 25000.
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

        if file:
            raise ValueError('The filepath cannot be empty')

        #TODO: Pherhaps check if the file exists? Not quite sure yet because im sending a file via sockets. So I can probably check this in the ui application

        disectedGCode = [i.strip() for i in open(file)]
        disectedGCode = gcoder.LightGCode(disectedGCode)
        
        printer = printcore(self.comPort, self.baudRate)
        printer.startprint(disectedGCode)




