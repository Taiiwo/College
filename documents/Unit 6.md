<center> Unit 6 - JavaScript Report </center>
==========================

-------------------------
##Task 1 - Discribing Application and Limitation
JavaScript is a programming language that can be compiled by moder browsers. This makes JavaScript popular for coding webpages. Because each browser compiles JavaScipt differently, there are often problems with cross browser comapatability. This means that some features that are available in one browser, do not work in another.

--------------------------

##Task 3 - Explaining a Select Statement
A select statement is a statement that selects a value for comparison. Examples of select statements include: if, else if, else, and while.

Here is an example of some code that checks is a number is validy by the system's terms:

    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }
    function validateNum(num){ //This defines a function for validating a number.
        if (num == "") {// Checks that the number has been entered (1)
            return false;
        }
        else if (!isNumber(num)) { // Checks if the number is 6 characters long( 2)
            return false;
        }
    	else if (!num >= 0){
    		return true;
    	}
        else { // ( 3)
            return  true;// if everything checks out, the function returns true
        }
    }
    function myFunction() {// this function is called by a button in HTML
        var message;
        var num = prompt("Please enter a number","");// Asks the user for input
        if (validateNum(num)){
            message = "Hello. The number "+ num +"is a valid number." ;
        }
        else{
            message = "Please click again and enter a valid number";
        }
        $("#greeting").html(message);// Publishes the message to an HTML element    
    }

If you look find the line with '(1)' at the end, you will see the first if statement.

    if (num == "") {/ Checks that the number has been entered (1)
        return false;
    }
    
The stuff inside the brackets (num == ""), is a logical test. If you're familliar with maths, it's essentially asking if what is inside the brackets makes mathematical sense. If not, it's asking if "" is in the variable 'name'.

If this test is valid (ie. num is in fact equal to "" (Nothing)) then the second line is executed, forcing the function to stop and returning false.

If the statement does not make sense, then the second line is ignored.

Another example of a Select statement is 'if else'. Look at the statement at (2):

    else if (name.length <= 1) { // Checks if the name is longer that one character (2)
            return false;
        }
        
This statement is exactly the same as an if statement, with the exception that it will only execute if the if statement in the line above fails the test.

