import datetime
days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']
i = 0
for day in days:# iterate through days
	if datetime.datetime.today().weekday() == i:# if the day is today
		print "Today is " + day# print the day
	else:
		print "Today is not " + day# else, print that it's not the day
	i += 1