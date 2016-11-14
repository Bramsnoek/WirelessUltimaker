# WirelessUltimaker
This is a personal project which I made to make my Ultimaker Wireless. It uses a Rasberry Pi which runs a Rest Api written in Python 
that talks to the ultimaker. The front-end is a simple website written in HTML/CSS/Javascript and uses the Fontys Api. Students of Fontys
Can login to this website using their Fontys account and can then upload GCode files which will then be printed. They need to be a part of
Delta though.

# Dependencies
<li>Python 2.7 (Because printrun is written in python 2.7)</li>
<li>Python-eve (http://python-eve.org/)</li>
<li>Flask Cors (https://flask-cors.readthedocs.io/en/latest/)</li>
<li>Printrun (Is provided in the git)</li>
<liMongodb (https://www.mongodb.com/)</li>
<li>OpenID-Connect-Php (Is provided in the git)</li>
<li>Phpseclib (Is provided in the git)</li>

# Run the rest api
In the <b>3DPrint</b> folder there are multiple scripts. The one you want to run is <b>main.py</b>. Make Sure you are using Python2.7 else you will get alot of errors! Als you need to run it as Admin or Sudo because there a some commands executed that need elevated permissions.

You can run it like this: <b>sudo python2.7 main.py</b>

# Run the website
In the <b>Website</b> folder there are multiple php files. Just host it somewhere or run it localhost and everything should work. The only this you need to worry about is the <b>login_config.sample.php</b> this is the login config that is going to be powering the Fontys Api. You will need to undertake several steps to get this working.

You can find an excellent explanation here: https://git.fhict.nl/delta-projecten/FHICT-OpenID-Sample (Credits to Stephan van Rooij)
