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

  
  <link href="css/home.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <script src="js/jquery.js"></script>
  <script type='text/javascript' src='js/materialize.min.js'></script>
  <script src="js/ieee.js" type="text/javascript"></script>

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

  <div class="container">

    <div class="welcome">
      <h1 class="welcome-header">MIT IEEE/ACM</h1>
      <div class="welcome-text">

        <p>The MIT IEEE/ACM Club represents the card branch for two professional international organizations, the <a href="http://ieee.org">Institute of Electrical and Electronics Engineers</a> (IEEE) and the <a href="http://acm.org">Association for Computing Machinery</a> (ACM). 
          Our mission is to create and support a tight-knit community among the cards, mainly undergraduates, and faculty in the Department of Electrical Engineering and Computer Science (EECS) at MIT.
        </p>


        <p class="join"><a data-toggle="modal" data-target="#joinUs" data-backdrop="true">Join our mailing list</a></p>
      </div>
    </div>

    <!-- <div class="calendar-section">
      <h1>What We're Up To</h1>
      <p class="subscribe-link"><a href="https://www.google.com/calendar/embed?src=ncvkteq0hm7cgr5bhi00bgbaik%40group.calendar.google.com" target="_blank">subscribe</a></p>
      <div id="calendar"></div>
    </div> -->

    <div id="programs">
      <h1>Programs</h1>
      <div>
        <h2><a href="programs.html#codeforgood">Code for Good</a></h2>
      </div>
      <div>
        <h2><a href="programs.html#ucc">IEEE MIT Undergraduate Research Technology Conference</a></h2>
      </div>
      <div>
        <h2><a href="programs.html#faculty">Faculty Dinners</a></h2>
      </div>
      <div>
        <h2><a href="programs.html#mitos">MIT Open Source Club</a></h2>
      </div>
      <div>
        <h2><a href="programs.html#counseling">Peer Counseling</a></h2>
      </div>
      <div>
        <h2><a href="programs.html#sixsharp">6#</a></h2>
      </div>
      <div>
        <h2><a href="programs.html#social">Social Hours</a></h2>
      </div>
      <div>
        <h2><a href="programs.html#urge">URGE</a></h2>
      </div>
      <div>
        <h2> <a href="programs.html#voltage">Voltage</a></h2>
      </div>
    </div>

    <div id="blog-post">
      <h1 class="blog-header">Last Blog Post</h1>
      <?php 
      $template = "Prototype";
      $number = "1";
      include("blog/show_news.php");
      ?>
      <h3 class="blog-link"><a href="blog.php">Check out the full blog!</a></h3>
    </div>

    <div id="exec" class="row">

      <div class="col l3 m6 s12">
        <div class="card" id="hlee">
          <div class="card-image">
            <img src='images/exec/hlee.jpg' width="195px">
          </div>
          <div class="card-content">
            <h3>Harlin Lee</h3>
            <p>President</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s12">
        <div class="card" id="kng">
          <div class="card-image">
            <img src='images/exec/kng.jpg' width="195px">
          </div>
          <div class="card-content">
            <h3>Kevin Ng</h3>
            <p>Vice President</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s12">
        <div class="card" id="igarza">
          <div class="card-image">
            <img src="images/exec/igarza.jpg" width="195px">
          </div>
          <div class="card-content">
            <h3>Isaac Garza</h3>
            <p>Co-Treasurer</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s12">
        <div class="card" id="pzhao">
          <div class="card-image">
            <img src="images/exec/pzhao.jpg">
          </div>
          <div class="card-content">
            <h3>Parker Zhao</h3>
            <p>External Relations</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s12">
        <div class="card" id="clao">
          <div class="card-image">
            <img src="images/exec/clao.jpg">
          </div>
          <div class="card-content">
            <h3>Czarina Lao</h3>
            <p>Secretary</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s12">
        <div class="card" id="schen">
          <div class="card-image">
            <img src="images/exec/schen.jpg">
          </div>
          <div class="card-content">
            <h3>Shirley Chen</h3>
            <p>Social Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s12">
        <div class="card" id="eakengin">
          <div class="card-image">
            <img src="images/exec/eakengin.jpg">
          </div>
          <div class="card-content">
            <h3>Efe Akenging</h3>
            <p>Social Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s12">
        <div class="card" id="mlao">
          <div class="card-image">
            <img src="images/exec/mlao.jpg">
          </div>
          <div class="card-content">
            <h3>Natalie Manting Lao</h3>
            <p>Chairwoman</p>
          </div>
        </div>
      </div>
      
      <div class="col l3 m6 s12">
        <div class="card" id="hmoncivais">
          <div class="card-image">
            <img src="images/exec/hmoncivais.png">
          </div>
          <div class="card-content">
            <h3>Hiram Moncivais</h3>
            <p>Historian</p>
          </div>
        </div>
      </div>
      
      <div class="col l3 m6 s12">
        <div class="card" id="kikhofua">
          <div class="card-image">
            <img src="images/exec/kikhofua.jpg">
          </div>
          <div class="card-content">
            <h3>Kamoya Ikhofua</h3>
            <p>Publicity Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s12">
        <div class="card" id="lchen">
          <div class="card-image">
            <img src="images/exec/lchen.jpg">
          </div>
          <div class="card-content">
            <h3>Lucy Chen</h3>
            <p>Publicity Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s12">
        <div class="card" id="cwomack">
          <div class="card-image">
            <img src="images/exec/cwomack.jpg">
          </div>
          <div class="card-content">
            <h3>Chris Womack</h3>
            <p>Webmaster</p>
          </div>
        </div>
      </div>

    </div>

  </div>




      <!-- Modal -->
      <div class="modal fade" id="joinUs">
        <div class="modal-dialog">
          <div class="modal-content">
            <form name="application" method="post" action="register.php" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Join the IEEE Mailing List</h4>
              </div>
              <div class="modal-body">

                <p>MIT ACM/IEEE membership is free for all MIT undergraduate and graduate cards.  Becoming a member of the MIT ACM/IEEE chapter is a great way to stay informed on upcoming club activities, and we're always looking for more help with our many programs.</p>

                <p>Please note that membership in our club is not the same as membership in the international <A href=http://www.acm.org>ACM</A> or <A href=http://www.ieee.org>IEEE</A> organizations. However, we do have access to resources that wouldn't be available without membership to the IEEE branch such as access to certain publications, contacts in IEEE and industry, and ability to coordinate events with the National organization.</p>



                <div class="input-group">
                  <span class="input-group-addon">Name</span>
                  <input type="text" class="form-control" placeholder="Name" name="required-name">
                </div>
                <br />

                <div class="input-group">
                  <span class="input-group-addon">MIT E-mail</span>
                  <input type="text" class="form-control" placeholder="kerberos@mit.edu" name="required-email">
                </div>
                <br />            
              </div>
              <div class="modal-footer">
                <a class="btn" data-dismiss="modal">Close</a>
                <input type="submit" value="Submit" align="middle" class="btn" >
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </body>
    </html>
