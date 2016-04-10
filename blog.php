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
    <nav class="z-depth-0">
      <div class="nav-wrapper">
        <a href="/club/" class="brand-logo">Logo</a>
        <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="/club/">Home</a></li>
          <li><a href="blog.php" class="blog-header-link">Blog</a></li>
          <li><a href="programs.html" class="active-header-link">SubCommittees</a></li>
        </ul>
        <ul class="side-nav" id="mobile-nav">
          <li><a href="/club/">Home</a></li>
          <li><a href="blog.php" class="blog-header-link">Blog</a></li>
          <li><a href="programs.html" class="active-header-link">SubCommittees</a></li>
        </ul>
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

</body>
</html>
