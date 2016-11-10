import subprocess, sys, time, os, sys
from printer import Printer
from auth import FontysAuth
from eve import Eve

#app = Eve(auth=FontysAuth, settings='settings.py')

#def print_file(id):
#    print(id)

#if __name__ == '__main__':
#    printRunDirectory = os.getcwd() + '/Printrun'
#    sys.path.insert(0, printRunDirectory)
#
#    app.run()

app = Eve() 

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')