import subprocess, sys, time, os, sys
from printer import Printer
from auth import FontysAuth
from eve import Eve
from pprint import pprint
import json
import base64

app = Eve(auth=FontysAuth, settings='settings.py')

def before_insert(resource_name, documents):
    if(resource_name == "printer"):

        correctData = str(documents)
        indexOfId = (str(correctData)).index('id')

        correctData = correctData.replace(correctData[3:indexOfId], "")
        correctData = correctData.replace("u'", "\"")
        correctData = correctData.replace("'", "\"")

        json_data_encoded = json.loads(str(correctData))
        
        file_result = open('image.gcode', 'wb')

        file_result.write(base64.decodestring(str(json_data_encoded[0]['id'])))

        file_result.close()

        #pPrinter = Printer("ttyS0")
       # pPrinter.Print(os.getcwd() + '/image.gcode')

        #os.remove(file_result)



if __name__ == '__main__':
    printRunDirectory = os.getcwd() + '/Printrun'
    sys.path.insert(0, printRunDirectory)

    app.on_insert += before_insert

    app.run(debug=True)