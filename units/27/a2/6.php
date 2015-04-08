<html>
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
  <? if (isset($_POST['query'])){// check if we've already been sent some creds
    // put the database creds into variables for security
    $dbUser = "a2";
    $dbPass = "iwasnottaughtthis";
    $host = "localhost";
    //connection to the database
    $db = mysqli_connect($host, $dbUser, $dbPass)
      or die("Unable to connect to MySQL");
    // select database
    $db->query("USE college");
    // satitise creds and put them in variables
    $query =  $db->real_escape_string($_POST['query']   );
    $user =   $db->real_escape_string($_POST['username']);
    // hash the password with sha256 for security
    $pass =   hash('sha256',($db->real_escape_string($_POST['password'])));
    // if the user pressed login
    if ($query == "login"){
      // search for their username
      $res = $db->query("select * from users where username='$user';");
      // if there are no results
      if ($res->num_rows < 1){
        echo "Access denied.";
      }
      else {// there are results
        // for each of the results (There should only be one)
        // get an assoc variable and call it $row
        while ($row = $res->fetch_assoc()) {
          // if the password hashes match
          if ($row['password'] == $pass){
            echo "Access granted.";
          }
          else {// if not
            echo "Access denied.";
          }
        }
      }
    }
    // if they asked us to register
    elseif ($query == "register") {
      // make a new record in the table
      $db->query("insert into users (username, password) values ('$user', '$pass')");
      echo "Registered sucessfully.";
    }
  }
  // if they haven't pressed anything yet, show them the login form
  else { ?>
  <!-- Simple login form -->
  <form action="6.php" method="POST" id="form">
    <input type="text" name="username" />
    <input type="password" name="password" />
    <input type="hidden" name="query" id="query" />
    <input type="button" id="login" value="Login" />
    <input type="button" id="register" value="Register" />
  </form>
  <script>
    // create on-click events for the buttons
    $('#login').click(function(e){
      // we pressed login, so make sure that is passed to the server
      $('#query').val("login");
      $('#form').submit();
    });
    $('#register').click(function(e){
      // we pressed register, so make sure that is passed to the server
      $('#query').val("register");
      $('#form').submit();
    });
  </script>
  <?
  }
  ?>
</body>
</html>
