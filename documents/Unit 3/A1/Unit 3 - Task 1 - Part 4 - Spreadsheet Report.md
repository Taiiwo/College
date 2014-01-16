Report
======
------------------
## Data Invalidation

Data is invalid when it does not meet the pattern or criteria specified. For example, and credit card number is 11 numerical digits long, and if it doesn't meet that criteria, it is definitely invalid. The data in the database may be invalid as the system put in place to record the data does not perform sufficient data validation.

## Required Data Validation

Data validation that would need to be performed by the input program would be a system to input data by account, so only one technician can input data from them. This would stop incorrect spelling of names. Another improvement would be to add a drop down menu for problem description instead of having the user type it in each time. This way, you won't have misspelled descriptions.
 
## The Data in the Database may be Inaccurate

- Data input system is flawed
- Deliberate mistakes
- Data from poor source

##What I did to Inaccurate Data

To find inaccurate data, I made the graphs I required, but spotted anomalous results. When I found anomalous data, I corrected the data to what I thought it is supposed to be. This isn't ideal, but it is the best that can be done to inaccurate data.

##The Fields I Chose
The fields I chose were:

```
Fault ID,	Date Logged, Fault Description, Customer ID, Chargeable, Tech Staff, Date Completed
```

I chose these as I found them necessary to complete the task. I didn't find any unececary fields, as I like to keep my work as flexible as possible.

I chose Date Logged and Date Completed, as I needed to calculate the time taken to fix the problem.

I chose Fault Description as I needed to calculate the count of the types of fault.

I chose Tech Staff as I needed to show data on each individual employee.


I chose the records from September, October, and November, as the task asked for data from the last 3 months.

##Fields that weren't needed to complete the task
```
Fault ID, Customer ID, Chargeable
```
These fields were not used in the graphs at all. Fault ID and Customer ID is mainly to include keys for the database, so I can see more infomation on the customers that have a particular problem, but I was not asked to do that in this task.

I left these fields in the database as it allows for making more graphs in the future that may include this data a much simpler process and put's less load on the database. This however, does depend on the scale of the data, and sometimes it is necessary to select only the used fields.

##The Fields I Added.
To complete the task, I needed to add certain fields to the sheet. I added:

```
Day Logged, Day Completed, Days Taken to Complete
```

'Day Logged' contained the day of the week that the problem was logged on. This was needed to show the tendancies throghout the weekday on a presentable graph/chart. 'Day Completed' on the other hand, contains the day of the week also, but this time for the day of the week that the issue was resolved. Again, this was to acheive a graph/chat that presentably displayed data on issue completion throughout the week. Finally, 'Days Taken to Complete' was created to show the sum of the date completed and -date logged. I used this to graph how long certain type of porblems took to fix.
