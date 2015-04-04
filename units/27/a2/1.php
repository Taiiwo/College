<?php
// This file gets browser info for use in PHP

// Do we have the info already?
if (isset($_POST['res']) && isset($_POST['useragent'])){
  // If we do, echo the info to the document
  echo $_POST['res'] . $_POST['useragent'];
}
// If not
else {
  // We use some javascript to bounce the connection to the client and back
  // Upon bounce, we will be sent desired client data
  echo "
// import jQuery
<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
// Set up the body of the document so we have somewhere to put stuff
// The height is 100% so that we have something to measure to get the browser height
<body style='height: 100%;'></body>
<script>
// Create a form DOM element
var form = $('<form/>')
	.attr('method',		'POST'		)
	.attr('action',		'./1.php'	)
	.attr('id',		    'tempForm'	)
	;
// Add input elements to the DOM with values containing our desired information
form.append($('<input/>'	)
	.attr('name', 'res'	)
	.attr('value', $(window).width() + 'x' + $(window).height())
);
form.append($('<input/>')
	.attr('name', 'useragent'	)
	.attr('value', navigator.userAgent )
);
// Write the form to the document body
$('body').append(form);
// Submit the form, redirecting the page to itsself, this time with post data
$('#tempForm').submit();
</script>";
}
?>
