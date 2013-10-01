<center> Unit 6 - JavaScript Report </center>
==========================

-------------------------
##Task 1 - Discribing Application and Limitation
JavaScript is a programming language that can be compiled by moder browsers. This makes JavaScript popular for coding webpages. Because each browser compiles JavaScipt differently, there are often problems with cross browser comapatability. This means that some features that are available in one browser, do not work in another.

--------------------------

##Task 3 - Explaining a Select Statement
A select statement is a statement that selects a value for comparison. Examples of select statements include: if, else if, else, and while.

Here is an example of some code:

    function validateName(name){ //This defines a function for validating a name.
    	if (name == "") {/ Checks that the name has been entered (1)
    		return false;
    	}
    	else if (name.length <= 1) { // Checks if the name is longer that one character (2)
    		return false;
    	}
    	else { // (3)
    		return true;// if everything checks out, the function returns true
    	}
    }
    function myFunction() {// this function is called by a button in HTML
    	var message;
    	var name = prompt("Please enter your name","");// Asks the user for input
    	if (validateName(name)){
    		message = "Hello " + name + "! How are you today?";
    	}
    	else{
    		message = "Please click again and enter a name";
    	}
    	$("#greeting").html(message);// Publishes the message to an HTML element    
    }
If you look find the line with '(1)' at the end, you will see the first if statement.

    if (name == "") {/ Checks that the name has been entered (1)
        return false;
    }
    
The stuff inside the brackets (name == ""), is a logical test. If you're familliar with maths, it's essentially asking if what is inside the brackets makes mathematical sense. If not, it's asking if "" is in the variable 'name'.

If this test is valid (ie. name is in fact equal to "" (Nothing)) then the second line is executed, forcing the function to stop and returning false.

If the statement does not make sense, then the second line is ignored.

Another example of a Select statement 
