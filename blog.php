<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MIT IEEE/ACM</title>

  <link href="stylesheets/blog.css" rel="stylesheet">
  <link href="stylesheets/main.css" rel="stylesheet">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="js/jquery.js"></script>
  <script type='text/javascript' src='js/materialize.min.js'></script>
  <script src="js/ieee.js" type="text/javascript"></script>
  <script src="js/blog.js" type="text/javascript"></script>

</head>

<body>

<!-- Header -->
<nav class="z-depth-0 blog-special">
  <div class="nav-wrapper">
    <a href="/" class="brand-logo"><img class="logo hide-on-med-and-down" src="images/logo-white.png"></a>
    <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="/club/">HOME</a></li>
      <li><a href="blog.php">BLOG</a></li>
    </ul>
    <ul class="side-nav" id="mobile-nav">
      <li><a href="/club/">HOME</a></li>
      <li><a href="blog.php">BLOG</a></li>
    </ul>
  </div>
</nav>


<div class="main container">
  <div class="row">
    <div class="col s12 m12 l8 offset-l2">
      <div class="blog-header valign-wrapper hide-on-small-and-down">
        <img src="images/logo-white" />
        <h2>IEEE/ACM Club Blog</h2>
      </div>
    <?php
          
          /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
          Cute news Init
          ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
          
          //Custom Template
          $template = "Full"; 
          $number = "5"; // Number of articles per page
          $PHP_SELF = "post.php";
          $only_active = TRUE;
          include("blog/show_news.php");

      ?>
    </div>
  </div>
</div>

</body>
</html>
