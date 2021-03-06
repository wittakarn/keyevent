<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/starter-template/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Typing</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  </head>

  <body>
    <div class="container">
      <pre>
        Hey Jude, don't make it bad 
        take a sad song and make it 
        better 
      </pre>
      <div class="panel panel-default">
        <div class="panel-body" id="typingResult" style="word-wrap: break-word"></div>
      </div>
    </div><!-- /.container -->

    <div class="container">
		<form id="typingForm" method="post" action="submit-json.php" target="_self">
      <input type="text" name="userId" />
			<input type="hidden" name="inputKeydownJsonData" id="hiddenKeydownJsonData"/>
			<input type="hidden" name="inputKeyupJsonData" id="hiddenKeyupJsonData"/>
			<input type="hidden" name="deleteJsonData" id="hiddenDeleteJsonData"/>
			<button type="button" class="btn btn-primary" id="submitJson">เสร็จสิ้น</button>
		</form>
	</div><!-- /.container -->
    <p>
      keydown
      <small id="inputKeydownJsonData"></small>
    </p>

    <p>
      keyup
      <small id="inputKeyupJsonData"></small>
    </p>

    <p>
      delete
      <small id="deleteJsonData"></small>
    </p>
  </body>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <script src="lib/jquery/jquery-1.11.3.min.js"></script>
  <script src="lib/jquery/jquery-ui-1.11.3.min.js"></script>
  <script src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="js/content.js"></script>
</html>