        date = _REQUEST['datetime']
	//This regular expression(re) matches any date after april 2014 at a time before 20:00
        if this regular expression doesn't match '"^[0-2]\d|3[0-1]/0\d|1[0-2]/201[4-9]|[2-9][0-9]-0\d|1[0-2]:[0-5]\d|60"' date :
                error = 1
                echo "[E] Bad Date<b />"
        fname = _REQUEST['fname']
	//This re will match any string of upper or lowercase letters between 2 and 15 characters long.
        if this regular expression doesn't match '"^[A-z]{2,15}"' fname:
                error = 1
                echo "[E] Bad fist name<b />"
        lname = _REQUEST['lname']
	//This re will match any string of upper or lowercase letters between 2 and 15 characters long.
        if this regular expression doesn't match '"^[A-z]{2,15}"' lname:
                error = 1
                echo "[E] Bad last name<b />"
        puloc = _REQUEST['puloc']
	//This will match any UK postcode. It will allow for a space in the center, but it's not required.
        if this regular expression doesn't match '"^[A-z]{1,2}\d\d?\s?\d[A-z]{2}"' puloc:
                error = 1
                echo "[E] Invalid pickup location<b />"
        doloc = _REQUEST['doloc']
	//This will match any UK postcode. It will allow for a space in the center, but it's not required.
        if this regular expression doesn't match '"^[A-z]{1,2}\d\d?\s?\d[A-z]{2}"' doloc:
                error = 1
                echo "[E] Invalid dopoff location<b />"
        TeacheID = _REQUEST['TeacheID']
	//This will match any strings. No ID system has been implemented so far, so I can't validate it
	//to fit any criteria.
        if this regular expression doesn't match '"./*"' TeacheID:
                error = 1
                echo "[E] Bad Teacher ID<b />"


        if the user is logged in && error != 1:
                Add booking to DB
                Email Teacher
                echo "[-]complete<br />";

