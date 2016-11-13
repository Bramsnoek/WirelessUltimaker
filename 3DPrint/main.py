import subprocess, os, sys
from subprocess import call
from printer import Printer
from auth import FontysAuth
from eve import Eve
from flask.ext.cors import CORS
import time
import json
import base64

#If I Ever Get IOError: [Errno32] Broken Pipe again: sudo service mongod restart
#You forgot to start mongoDB service!

app = Eve(settings='settings.py')

def before_insert(documents):
    #if(resource_name == "printer"):
    correctData = generalizeData(str(documents))
    json_data_encoded = json.loads(str(correctData))
    
    file_result = open('/gcodefiles/image.gcode', 'wb')
    file_result.write(base64.decodestring(str(json_data_encoded[0]['id'])))
    file_result.close()

    pPrinter = Printer("/dev/ttyACM1")
    pPrinter.Print(os.getcwd() + '/gcodefiles/image.gcode')

def generalizeData(correctData):
    indexOfId = (str(correctData)).index('id')
    correctData = correctData.replace(correctData[3:indexOfId], "")
    correctData = correctData.replace("u'", "\"")
    correctData = correctData.replace("'", "\"")
    return correctData

if __name__ == '__main__':
    call(["sudo", "service", "mongod", "restart"])

    printRunDirectory = os.getcwd() + '/Printrun'
    sys.path.insert(0, printRunDirectory)

    app.on_insert_printer += before_insert

    CORS(app)
    app.run(debug=True, port=12000)