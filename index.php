<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/starter-template/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Information</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  </head>

  <body>
    <form method="post" action="submit-info.php" target="_self">
      <div class="container">
        <div class="form-group">
          <label for="fullname">ชื่อ-นามสกุล</label>
          <input class="form-control" id="fullname" name="username" required="true" autofocus>
        </div>
        <button type="submit" class="btn btn-primary">ยืนยัน</button>
      </div><!-- /.container -->
    </form>
  </body>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <script src="lib/jquery/jquery-1.11.3.min.js"></script>
  <script src="lib/jquery/jquery-ui-1.11.3.min.js"></script>
  <script src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="js/content.js"></script>
</html>