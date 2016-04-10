<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MIT IEEE/ACM</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="css/blog.css" rel="stylesheet">
    <link href="css/ieee.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </head>

  <body>
	
    <!-- Header -->
    <nav class="navbar navbar-inverse navbar-fixed-top"> 
      <div class="container"> 
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div> 
        <div class="collapse navbar-collapse" id="navbar-collapse">   
          <ul class="nav navbar-nav">
            <li><a href="/club/">HOME</a></li>
            <li><a href="blog.php" class="active-header-link">BLOG</a></li>
            <li><a href="programs.html">PROGRAMS</a></li>
          </ul>
        </div>
      </div>
    </nav>

            
    <div class="main">

      <?php
        
        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Cute news Init
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        
        //Custom Template
        $template = "Prototype"; 
        $number = "10"; // Number of articles per page
                 
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
    
  <footer>
    <div class="copyright">
      <p>&copy; 2016 MIT IEEE/ACM Club</p>
    </div>
  </footer>

</body>
</html>
