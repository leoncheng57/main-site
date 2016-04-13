<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MIT IEEE/ACM</title>

    <link href="css/blog.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <script src="js/jquery.js"></script>
    <script type='text/javascript' src='js/materialize.min.js'></script>
    <script src="js/ieee.js" type="text/javascript"></script>
    <script src="js/blog.js" type="text/javascript"></script>

  </head>

  <body>
	
    <!-- Header -->
    <nav class="z-depth-0">
      <div class="nav-wrapper">
        <a href="/club/" class="brand-logo"><img class="logo hide-on-med-and-down" src="images/logo-white.png"></a>
        <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="/club/">HOME</a></li>
          <li><a href="blog.php">BLOG</a></li>
          <li><a href="programs.html">PROGRAMS</a></li>
        </ul>
        <ul class="side-nav" id="mobile-nav">
          <li><a href="/club/">HOME</a></li>
          <li><a href="blog.php">BLOG</a></li>
          <li><a href="programs.html">PROGRAMS</a></li>
        </ul>
      </div>
    </nav>

            
    <div class="main container">
      <div class="row">
        <?php
          
          /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
          Cute news Init
          ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
          
          //Custom Template
          $template = "Full"; 
          $number = "5"; // Number of articles per page
                   
          if($_POST['do'] == "search" or $_GET['dosearch'] == "yes") {
              $subaction = "search";
              $dosearch = "yes";
              include("blog/search.php");
            }
          elseif($_GET['do'] == "archives") {
              include("blog/show_archives.php");
            }
          elseif($_GET['do'] == "stats") {
              echo "You can download the stats addon and include it here to show how many news, comments … you have";
              /* include("$path/stats.php"); */ 
            }
          else{ include("blog/show_news.php"); }

        ?>
      </div>
    </div> 

</body>
</html>
