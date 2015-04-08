<!--live: http://taiiwo.tk/College/units/27/a2/5.php-->
<html>
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="http://ace.c9.io/build/src/ace.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
  <div id="editor"><?
      // print_r(scandir('uploads/'));
      $filename = scandir('uploads/')[3];
      $fileLoc = "uploads/" . $filename;
      if (isset($_POST["text"])) {
        echo $_POST["text"];
        file_put_contents($fileLoc, $_POST["text"]);
      }
      echo htmlspecialchars(file_get_contents($fileLoc));
    ?></div>
  <form action="5.php" method="POST" id="form" >
    <input name="text" type="hidden" id="text"/>
    <input id="save" type="button" value="Save" />
  </form>
  <style>
    #editor {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
    }
    #save {
      position: absolute;
      bottom: 0px;
      left: 0px;
      right: 0px;
      width: 100%;
      height: 30px;
      border: 0px;
    }
  </style>
  <script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/idle_fingers");
    $('#save').click(function (e){
      $('#text').val(editor.getValue());
      $('#form').submit();
    });
  </script>
</body>
</html>
