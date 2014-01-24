Unit 3 - Task 1
===============

Intro
-----
An information system is an integrated set of components for 
collecting, storing, and processing data and for 
delivering information, knowledge, and digital products. Business 
firms and other organizations rely on information
systems to carry out and manage their operations, interact with their 
customers and suppliers, and compete in the
marketplace.

Executive Support Systems
----------------------
####For this section, we will be using an executive support system for a supermarket's management staff.

##Features
### Description
The system allows you to make decisions based on your staff's 
behavior. It creates graphs and charts, as well 
as calculates real time information.

### Data Type
The executive support system uses, gathers and analyses and summaries 
the key internal and external information used in the business.

### Who is it Used by
Executive support systems are designed to help senior management make 
strategic decisions.

###Hardware Required
- Server - This is to receive all of the data, draw the graphs, and store the data in a locatable area
- Data Collection Units
    - For example:
    - Barcode scanners
    - Handheld stock checkers
    - Punchcard machine

###Software Required
- Server software to gather data and make graphs
- Client software to gather the information

###Telecomunications Required
- Local network
- Internet (Optional) - This is in case you want to factor in external information in order to process the data

##Functions
###Input
Data is input into the system via the client devices that connect to 
the server and input various information such as how much stock is 
left, for example.

###Collection
Data is collected via the client devices by using the interface on 
those. This interface is usually graphical, and has various buttons and 
text boxes in order to help data collection. The data is then collected 
by the server over the local network or via the internet every specified
period of time.

###Output
The system will usually output the information in a series of graphs 
and charts, as well as real time information that allow you to make 
informed decicions.

###storage
The data is stored on the server, usually on a SQL server in database 
format.

###Processing
The data is processed by the server in order to make the graphs and 
charts. Sometimes the data is specially formatted, such as 
capitalizing names and such.

###Retreival
Many systems will allow you to export the data as an array of formats 
from PDF to CSV to JPG.

###Control and Feedback Loops
The data could be used to help to improve the system. You can observ the 
data to see what are the most common mistakes, and use that information to 
try to improve the input of the system. For example you could decide that 
there are too many mistakes in the inputting of the stock levels, and you 
may wat to have them manually checked on a monthly basis.

Guild Wars 2 Spidey
-------------------
###Description of what the system does
Guild Wars 2 Spidey is a system that uses the Guild Wars 2 API to monitor 
prices on the trading post from within the game. The system also does 
further calculations. Simply put, the best items in the game are made up of 
components. Most of these components can be purchased from the trading
post(TP). Most of the components can be crafted/refined from other 
components, for example, cloth scraps can be refined into bolts of cloth, 
and those can be used to make cloth armor, along with other components. The 
problem is that all of the components are purchasable, and if you want to 
make a specific peice of armor, you don't know if it's cheaper to buy the 
raw components, or buy them pre-refined. Another solution that Guild Wars 2 
Spidey (GW2Spidey) offers is the ability to list items by the largest 
posative difference betweent the total cost of an items components, and the 
amount that an item can be sold for on the trading post including 
transaction costs and listing fees. This allows you to see from crafting 
which item, you can make the most profit.

###Data the system uses
The system pulls information from the GW2 API (Application Programming 
Interface). This is a service offered by GW2 that allows you to pull down 
data about the game in a format that is easy to import into a program 
(JSON). The particular data pulled(Think of TP like eBaY):
 - lowest selling price - used to calculate cost
 - It does not pull lowest buying price, I wish it did, because then you 
	could choose instant sales over profit
 - components of an item - used to break down an item into it's components 
	and figure out the cost

###The people who use the system
The system is used almost exclsively by the players of GW2 in order to 
attempt to make money off the crafting system. The supporters of the system 
are not needed, as AreaNet (The auther of GW2) set the APIs up to update 
automatically.

###Hardware Required
 - Server to pull information from the trading post database (Provided by 
	AreaNet)
 - Webserver to host the GW2Spidey website

###Software Required
 - Webserver software
 - They need to program a back end
 - They need to program a front end
(The website is opensource, code here 
<a href="https://github.com/rubensayshi/gw2spidy">
	https://github.com/rubensayshi/gw2spidy
</a>.

###Telecommunications required
 - Internet - To allow people access to the site externally

###Input
The data in the system in input entirely by the API. This means that 
ArenaNet are responsible for any inconsistencies with the data, but from my 
expeience, the data is very accurate as it is taken directly from the TP.

###Output
The data is processed and output onto the web frontend. The web frontend 
lists the important data for crafting, and also individual items, 
displaying graphs for their price over time.

###Storage
Data received from the GW2 API is stored using MySQL as  you  can see here 
:
<a href="https://github.com/rubensayshi/gw2spidy/search?q=SQL&ref=cmdform">
	https://github.com/rubensayshi/gw2spidy/search?q=SQL&ref=cmdform
</a>
