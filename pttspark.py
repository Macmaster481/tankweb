from itty import *
import urllib2
import json
import MySQLdb
test=[]
user="ba.chayanon_st@tni.ac.th"
waterlevel = []
checkwater = []
checkworkdb = []

admin="ba.chayanon_st@tni.ac.th"

conn = MySQLdb.Connect(host="localhost", user="root", passwd="", db="sparkbot")
cur = conn.cursor()
sql = "SELECT * FROM tank"
cur.execute(sql)
checkwater = cur.fetchall()
print checkwater
print "....."
for i in range(len(checkwater)):
	waterlevel.append(str(checkwater[i]).replace('(', r'').replace("'", r'').replace(',', r'').replace(')', r'').replace(' ', r'').replace('L', r''))
print waterlevel
for i in range(3):
	for j in range(2):
		test.append(waterlevel[i][j])
print test



def sendSparkGET(url):
    """
    This method is used for:
        -retrieving message text, when the webhook is triggered with a message
        -Getting the username of the person who posted the message if a command is recognized
    """
    request = urllib2.Request(url,
                              headers={"Accept": "application/json",
                                       "Content-Type": "application/json"})
    request.add_header("Authorization", "Bearer " + bearer)
    contents = urllib2.urlopen(request).read()
    return contents


def sendSparkPOST(url, data):
    """
    This method is used for:
        -posting a message to the Spark room to confirm that a command was received and processed
    """
    request = urllib2.Request(url, json.dumps(data),
                              headers={"Accept": "application/json",
                                       "Content-Type": "application/json"})
    request.add_header("Authorization", "Bearer " + bearer)
    contents = urllib2.urlopen(request).read()
    return contents


@post('/')
def index(request):

    waterleveldb=[]
    ctest=[]
    
    webhook = json.loads(request.body)
    result = sendSparkGET('https://api.ciscospark.com/v1/messages/{0}'.format(webhook['data']['id']))
    print test
    result = json.loads(result)
    msg = None
    print "*****************"
    
    print user
    conn = MySQLdb.Connect(host="localhost", user="root", passwd="", db="sparkbot")
    cur = conn.cursor()
    sql = "SELECT * FROM tank"
    sendSparkPOST("https://api.ciscospark.com/v1/messages", {"toPersonEmail": "ctest@sparkbot.io", "text": "hello"})  
    cur.execute(sql)
    checkwaterdb = cur.fetchall()
    for i in range(len(checkwaterdb)):
        waterleveldb.append(str(checkwaterdb[i]).replace('(', r'').replace("'", r'').replace(',', r'').replace(')', r'').replace(' ', r'').replace('L', r''))
    print waterleveldb
    for i in range(3):
        for j in range(2):
            ctest.append(waterleveldb[i][j])
    print ctest
    if (test != ctest):
        if (ctest[1] == '1'):
           testf="Tank A Low water"
           sendSparkPOST("https://api.ciscospark.com/v1/messages", {"toPersonEmail": user, "text": testf})          
           for i in range (6):
                test[i]=ctest[i]
				
        if (ctest[1] == '2'):
           testf="Tank A medium water"
           sendSparkPOST("https://api.ciscospark.com/v1/messages", {"toPersonEmail": user, "text": testf})          
           for i in range (6):
                test[i]=ctest[i]
				
        if (ctest[1] == '3'):
           testf="Tank A full water"
           sendSparkPOST("https://api.ciscospark.com/v1/messages", {"toPersonEmail": user, "text": testf})          
           for i in range (6):
                test[i]=ctest[i]
				
        if (ctest[3] == '1'):
           testf="Tank B Low water"
           sendSparkPOST("https://api.ciscospark.com/v1/messages", {"toPersonEmail": user, "text": testf})          
           for i in range (6):
                test[i]=ctest[i]
				
        if (ctest[3] == '2'):
           testf="Tank B medium water"
           sendSparkPOST("https://api.ciscospark.com/v1/messages", {"toPersonEmail": user, "text": testf})          
           for i in range (6):
                test[i]=ctest[i]
				
        if (ctest[3] == '3'):
           testf="Tank B full water"
           sendSparkPOST("https://api.ciscospark.com/v1/messages", {"toPersonEmail": user, "text": testf})          
           for i in range (6):
                test[i]=ctest[i]
				
        if (ctest[5] == '1'):
           testf="Tank C Low water"
           sendSparkPOST("https://api.ciscospark.com/v1/messages", {"toPersonEmail": user, "text": testf})          
           for i in range (6):
                test[i]=ctest[i]
				
        if (ctest[5] == '2'):
           testf="Tank C medium water"
           sendSparkPOST("https://api.ciscospark.com/v1/messages", {"toPersonEmail": user, "text": testf})          
           for i in range (6):
                test[i]=ctest[i]
				
        if (ctest[5] == '3'):
           testf="Tank C full water"
           sendSparkPOST("https://api.ciscospark.com/v1/messages", {"toPersonEmail": user, "text": testf})          
           for i in range (6):
                test[i]=ctest[i]
		
	
    if webhook['data']['personEmail'] != bot_email:

        in_message = result.get('text', '').lower()
        in_message = in_message.replace(bot_name, '')

        if 'batman' in in_message or "whoareyou" in in_message:
            msg = "I'm Batmanddddddd!"

        if msg != None:
            print msg
            sendSparkPOST("https://api.ciscospark.com/v1/messages", {"roomId": webhook['data']['roomId'], "text": msg})
    return "true"



####CHANGE THESE VALUES#####
bot_email = "watercontrol@sparkbot.io"
bot_name = "watercontrol"
bearer = "ODFhYzU4NTUtNDRmMC00NDAzLTg2NTctOGMyMmMzYTdkMzhhZjdhM2FkMTctZDZi"
bat_signal = "https://upload.wikimedia.org/wikipedia/en/c/c6/Bat-signal_1989_film.jpg"
run_itty(server='wsgiref', host='0.0.0.0', port=10010)