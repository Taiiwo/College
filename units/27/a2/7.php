<?php //live: http://taiiwo.tk/College/units/27/a2/7.php
  echo preg_replace('~(\[\d{2}-[A-Z|a-z]{3}-\d{4} \d\d:\d\d:\d\d \w*/\w*\])~',
    '<br />$1',
    file_get_contents("/home/taiiwo/php_errors.log")
  );
?>
