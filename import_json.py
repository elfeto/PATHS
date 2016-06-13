import json
import time
import glob
import numpy
from datetime import datetime
from datetime import timedelta    
from os import system
from subprocess import call

def ReadFILE(FILE1, FILE2):
	#f = open(FILE2, 'w')
	json_data=open(FILE1)
	data = json.load(json_data)
	print data
	for indx, thing in  enumerate(data["data"], start=0):
		print data
		if data["field"] == "ppg1":
			print str(time.ctime(int(str(thing["ts"])[0:-3])))
			print thing["min"]
			print thing["max"]
			print thing["sum"]
			print thing["variance"]
			print thing["mean"]
		elif data["field"] == "ppg2":
			print str(time.ctime(int(str(thing["ts"])[0:-3])))
			print thing["min"]
			print thing["max"]
			print thing["sum"]
			print thing["variance"]
			print thing["mean"]
		elif data["field"] == "ppg3":
			print str(time.ctime(int(str(thing["ts"])[0:-3])))
			print thing["min"]
			print thing["max"]
			print thing["sum"]
			print thing["variance"]
			print thing["mean"]
		elif data["field"] == "ppg4":
			print str(time.ctime(int(str(thing["ts"])[0:-3])))
			print thing["min"]
			print thing["max"]
			print thing["sum"]
			print thing["variance"]
			print thing["mean"]
		elif data["field"] == "ppg5":
			print str(time.ctime(int(str(thing["ts"])[0:-3])))
			print thing["min"]
			print thing["max"]
			print thing["sum"]
			print thing["variance"]
			print thing["mean"]
		elif data["field"] == "ppg6":
			print str(time.ctime(int(str(thing["ts"])[0:-3])))
			print thing["min"]
			print thing["max"]
			print thing["sum"]
			print thing["variance"]
			print thing["mean"]
		elif data["field"] == "ppg7":
			print str(time.ctime(int(str(thing["ts"])[0:-3])))
			print thing["min"]
			print thing["max"]
			print thing["sum"]
			print thing["variance"]
			print thing["mean"]
		elif data["field"] == "accelerometery":
			print thing
		elif data["field"] == "accelerometerx":
			print thing
		elif data["field"] == "accelerometerz":
			print thing
		elif data["field"] == "skintemperature":
			print thing
		else:
			print data.keys()





#		for item in thing["data"].keys():

#			if indx+1 < len(thing["data"]):
#				date1 = int(str(thing["cts"])[0:-3])
#				date2 = int(str(data["sdids"][indx+1]["cts"])[0:-3])
#				
#			if item == "ppg7":
#				#print time.ctime(int(date1)), time.ctime(int(date2))
#				print thing["cts"]
#				LAST = thing["data"][item]
#				a = str(time.ctime(int(str(thing["cts"])[0:-3]))) + "," + str(numpy.median(LAST)) + "\n"
#				f.write(a)



#FILE = 'c34e9556019d452eaf463c4eba27b7a8-1461245883545.json'
End = datetime.now()
Start = End - timedelta(minutes=5)
#Start = datetime.now() - timedelta(hours=1)
End = End + timedelta(minutes=1)
print Start
print " to "
print End
StartTime = int(Start.strftime("%s")) * 1000 
EndTime = int(End.strftime("%s")) * 1000 
Things = ["ppg1","ppg2","ppg3","ppg4","ppg5","ppg6","ppg7","accelerometerX","accelerometerY","accelerometerZ","skinTemperature"]

for item in Things:
	system("php test.php " + str(StartTime) + " " + str(EndTime) + " " + item)
	TFILE = str(EndTime) + "_" + item + "_.txt"
	FFILE = item + ".json"
	print item
	ReadFILE(FFILE, TFILE)
#system("mv info.txt " + str(End) + "-info.txt")







































def READALL():
	f = open('workfile.txt', 'w')
	for filename in glob.glob('*.json'):
		print filename
		with open(filename) as data_file:  
		    data = json.load(data_file)

		    for indx, thing in  enumerate(data["data"], start=0):
		    	#print thing["data"].keys()
		    	#print "******************************************************************************************************************************"
		    	#print time.ctime(int(str(thing["cts"])[0:-3]))
		    	for item in thing["data"].keys():
		    		if item == "ppg7":
		    			date1 = int(str(thing["cts"])[0:-3])
		    			date2 = int(str(data["data"][indx+1]["cts"])[0:-3])
		    			# time.ctime(int(date1)), time.ctime(int(date2))
		    			LAST = thing["data"][item]
		    			a = str(time.ctime(int(str(thing["cts"])[0:-3]))) + "," + str(numpy.median(LAST)) + "\n"
		    			f.write(a)
		    			#print "This is " + str(item) + " and its " + str(thing["data"][item])
		   # 		if item == "ppg6":
		   # 			print "This is " + str(item) + " and its " + str(thing["data"][item])
		    #		if item == "ppg5":
		    #			print "This is " + str(item) + " and its " + str(thing["data"][item])	    			
		    #		if item == "ppg4":
		    #			print "This is " + str(item) + " and its " + str(thing["data"][item])
		    #		if item == "ppg3":
		    #			print "This is " + str(item) + " and its " + str(thing["data"][item])
		    #		if item == "ppg2":
		    #			print "This is " + str(item) + " and its " + str(thing["data"][item])
		    #		if item == "ppg1":
		    #			print "This is " + str(item) + " and its " + str(thing["data"][item])


		    	#	if item != "payload":
		    	#		print "This is " + str(item) + " and its " + str(thing["data"][item])
