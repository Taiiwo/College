Unit 6 - Assignment 2 - Task 2b
===============================

Benefits of using a multitude of datatypes
------------------------------------------
Using many datatypes is useful to developers as it makes it easy to perform tasks 
on variables that would require more, and more complex code to have performed 
otherwise. This saves a lot of time, and improves the quality of code. An example 
of this is if we had two dates, say a date of registration and a date of birth. 
To calculate the age of the person at registration if the datatypes are 'date', 
we can simply subtract the dates from eachother. If we did not used the correct 
type, and selected string instead, it would take more complex programming to 
convert the date in a string form into a number that we can work with, and then 
we'd have to format it back into string format. As you can imagine, this is a 
very laborious way of doing things, and it saves a lot of time and effort if we 
use the correct datatypes when writing our code.

Users Table
-----------

| Field Name 	| Type 		| Length| Notes 									| Required | Type Justification 						| Length Justification 												|
|:---------- 	|:-------------:|:-----:|:-----------------------------------------------------------------------------:|:---:|:------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------|
| Customer ID 	| int  		| Auto	| Used to identify the user and make sure that no two users get confused 	| Yes | The data will always be an integer 					| The data will increment automatically 									|
| First name 	| Char 		| 50	| The first name of the user    						| Yes | First name is a string, and therefore should use char type 		| 50 should be sufficient to fit a reasonable length name. 							|
| Second name 	| Char 		| 50	| The second name of the user   						| Yes | Second name is also as string and should also be given char type 	| 50 should be a suitable about of character for any reasonable sencond name. 					|
| Telephone 	| Char 		| 11 	| Used for emergencies       							| Yes | A telephone number will almost never be used in a mathematical calulation and therefore it is illogical to be stored as and integer. | 11 is the length of a standard phone number. 	|
| Title 	| Char 		| 5 	| For storing the customer's title						| Yes | A title is a string as only letters and symbols are used. 		| 5 is the longest a title can be including the '.' at the end. 						|
| DOB 		| Date 		| 13	| Store date of birth to verify age 						| Yes | Date as storing dates as time allows you to perform multiple processes on it, such as taking it away from the current date to get the user's age | If the time is stored in the UNIX time format, then 13 bytes should last a long time |
| Provisional # | Char 		| 19	| Used to sign up for driving tests 						| Yes | It is a Char type as it made of both characters and numbers 		| Length is the same as that on the licence.									|
| Address 	| Char 		| 100	| User's address 								| Yes | Address contains letters, numbers, and symbols 				| 100 chars should fit any address 										|
| Email 	| 30		| Char 	| Used to contact the user and confirm payments 				| Yes | An email can contain numbers, letters, and symbols. 			| 30 chars should fit any email address 									|
| Gender 	| Boolean	| Fixed | The gender of the user 							| No  | There can only be one of two values 					| Boolean values have a fixed length 										|

Bookings Table
---------------
| Field Name 		| Type 		| Length| Notes							| Required | Type Justification				| Length Justification						|
|:---------------------:|:-------------:| :---:	|:-----------------------------------------------------:|:---:|:------------------------------------------------|:--------------------------------------------------------------|	
| Lesson ID		| Int		| Auto	| Gives to the row to represent it's uniqueness		| Yes | The data will always be an integer		| The data will increment automatically 			|
| Customer ID		| Int		| Auto	| Represents the user involved in the lesson		| Yes | The data will always be an integer		| The data will be imported from another table			|
| Instructor ID		| Int		| Auto	| Represents the instructor involved in the lesson	| Yes | The data will always be an integer		| The data will be imported from another table			|
| Pickup address	| Char		| 12	| Address to pick up at					| Yes | The data contains alpha numeric characters	| The field will only contain an house number or name		|
| Pickup postcode	| Char		| 7	| Postcode to pick up at				| Yes | The data contains alpha numeric characters	| An UK postcode is 7 characters long, not including the space	|
| Dropoff address	| Char		| 12	| Address to drop off at				| Yes | The data contains alpha numeric characters	| The field will only contain an house number or name		|
| Dropoff postcode	| Char		| 7	| Postcode to drop off at				| Yes | The data contains alpha numeric characters	| An UK postcode is 7 characters long, not including the space	|
| Date Time		| DateTime	| 8	| Date and time of the lesson				| Yes | The data represents a time and date		| DateTime fields occupy 8 bytes of space			|


