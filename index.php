<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MIT IEEE/ACM</title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">

  
  <link href="stylesheets/home.css" rel="stylesheet">
  <link href="stylesheets/main.css" rel="stylesheet">
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="js/jquery.js"></script>
  <script type='text/javascript' src='js/materialize.min.js'></script>
  <script type='text/javascript' src='js/google-calendar-events.min.js'></script>
  <script src="js/ieee.js" type="text/javascript"></script>

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

  <div class="container">

    <div class="row">
      <div class="col s12 welcome">
        <h1>MIT IEEE/ACM</h1>
          <p>The MIT IEEE/ACM Club represents the card branch for two professional international organizations, the <a href="http://ieee.org">Institute of Electrical and Electronics Engineers</a> (IEEE) and the <a href="http://acm.org">Association for Computing Machinery</a> (ACM). 
            Our mission is to create and support a tight-knit community among the cards, mainly undergraduates, and faculty in the Department of Electrical Engineering and Computer Science (EECS) at MIT.
          </p>

          <a class="btn waves-effect waves-light modal-trigger join" href="#join-modal">Join our mailing list</a>
      </div>
    </div>

    <!-- <div class="calendar-section">
      <h1>What We're Up To</h1>
      <p class="subscribe-link"><a href="https://www.google.com/calendar/embed?src=ncvkteq0hm7cgr5bhi00bgbaik%40group.calendar.google.com" target="_blank">subscribe</a></p>
      <div id="calendar"></div>
    </div> -->

    <div class="row section">
      <!-- <div class="col l7 m6 s12 z-depth-1"></div> -->
      <div class="col offset-l7 l5 offset-m6 m6 s12 z-depth-1">
        <div class="programs">
          <h6 class="programs-label">PROGRAMS</h6>
          <div class="divider"></div>
          <ul class="programs-list">
            <li><a href="programs.html#codeforgood">Code for Good</a></li>
            <li><a href="programs.html#ucc">IEEE MIT Undergraduate Research Technology Conference</a></li>
            <li><a href="programs.html#faculty">Faculty Dinners</a></li>
            <li><a href="programs.html#mitos">MIT Open Source Club</a></li>
            <li><a href="programs.html#counseling">Peer Counseling</a></li>
            <li><a href="programs.html#sixsharp">6#</a></li>
            <li><a href="programs.html#social">Social Hours</a></li>
            <li><a href="programs.html#urge">URGE</a></li>
            <li><a href="programs.html#voltage">Voltage</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="divider"></div>

    <div class="row section">
      <div class="col s12" id="blog-post">
        <h5 class="blog-label">LATEST BLOG POST</h5>
        <?php 
        $template = "Home";
        $number = "1";
        include("blog/show_news.php");
        ?>
        <h5 class="right-align"><a href="blog.php" class="btn-flat blog-btn">See The Full Blog</a></h5>
        <div class="divider"></div>
      </div>
    </div>

    <div id="exec" class="row">

      <div class="col l3 m6 s6">
        <div class="card" id="hlee">
          <div class="card-image">
            <img src='images/exec/hlee.jpg' width="195px">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Harlin Lee</h6>
            <p class="exec-title">President</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="kng">
          <div class="card-image">
            <img src='images/exec/kng.jpg' width="195px">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Kevin Ng</h6>
            <p class="exec-title">Vice President</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="igarza">
          <div class="card-image">
            <img src="images/exec/igarza.jpg" width="195px">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Isaac Garza</h6>
            <p class="exec-title">Treasurer</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="pzhao">
          <div class="card-image">
            <img src="images/exec/pzhao.jpg">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Parker Zhao</h6>
            <p class="exec-title">External Relations</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="clao">
          <div class="card-image">
            <img src="images/exec/clao.jpg">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Czarina Lao</h6>
            <p class="exec-title">Secretary</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="schen">
          <div class="card-image">
            <img src="images/exec/schen.jpg">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Shirley Chen</h6>
            <p class="exec-title">Social Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="makengin">
          <div class="card-image">
            <img src="images/exec/makengin.jpg">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Efe Akengin</h6>
            <p class="exec-title">Social Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="mlao">
          <div class="card-image">
            <img src="images/exec/mlao.jpg">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Natalie Lao</h6>
            <p class="exec-title">Chairwoman</p>
          </div>
        </div>
      </div>
      
      <div class="col l3 m6 s6">
        <div class="card" id="hmoncivais">
          <div class="card-image">
            <img src="images/exec/hmoncivais.png">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Hiram Moncivais</h6>
            <p class="exec-title">Historian</p>
          </div>
        </div>
      </div>
      
      <div class="col l3 m6 s6">
        <div class="card" id="kikhofua">
          <div class="card-image">
            <img src="images/exec/kikhofua.jpg">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Kamoya Ikhofua</h6>
            <p class="exec-title">Publicity Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="lchen">
          <div class="card-image">
            <img src="images/exec/lchen.jpg">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Lucy Chen</h6>
            <p class="exec-title">Publicity Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="cwomack">
          <div class="card-image">
            <img src="images/exec/cwomack.jpg">
          </div>
          <div class="card-content">
            <p class="exec-name flow-text">Chris Womack</h6>
            <p class="exec-title">Webmaster</p>
          </div>
        </div>
      </div>

    </div>

  </div>




  <!-- Modal -->
  <div class="modal" id="join-modal">
    <div class="modal-content">
      <div class="row">
        <h4 class="col s12">Join the IEEE Mailing List</h4>

        <div class="row">
          <p class="col s12">Membership is free for all MIT undergraduate and graduate cards.  Becoming a member of the MIT IEEE/ACM chapter is a great way to stay informed on upcoming club activities!</p>

          <p class="col s12 join-disclaimer">Please note that membership in our club is not the same as membership in the international IEEE or ACM organizations.</p>
        </div>


      
        <form name="application" method="post" action="register.php" class="col s12">
          <div class="row">
            <div class="input-field col s12 m12 l6">
              <input type="text" name="first-name" id="first-name" required>
              <label for="first-name">First Name</label>
            </div>
            <div class="input-field col s12 m12 l6">
              <input type="text" name="last-name" id="last-name">
              <label for="last-name">Last Name</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input type="email" id="email" name="email" required>
              <label for="email">MIT Email</label>
            </div>
          </div> 
        </form>
      </div>
    </div><!-- /.modal-content -->
    <div class="modal-footer">
      <input type="submit" value="Submit" align="middle" class="btn-flat" >
      <a class="modal-action modal-close btn-flat" data-dismiss="modal">Close</a>
    </div>
  </div><!-- /.modal -->

</body>
</html>
