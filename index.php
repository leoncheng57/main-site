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
      <a href="/club/" class="brand-logo"><img class="logo" src="images/logo-white.png"></a>
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

          <a class="btn waves-effect waves-light join">Join our mailing list</a>
      </div>
    </div>

    <!-- <div class="calendar-section">
      <h1>What We're Up To</h1>
      <p class="subscribe-link"><a href="https://www.google.com/calendar/embed?src=ncvkteq0hm7cgr5bhi00bgbaik%40group.calendar.google.com" target="_blank">subscribe</a></p>
      <div id="calendar"></div>
    </div> -->

    <div class="row section">
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
        <h5 class="blog-label valign-wrapper">Latest Blog Post<a class="btn-flat right valign">See Full Blog</a></h5>
        <?php 
        $template = "Prototype";
        $number = "1";
        include("blog/show_news.php");
        ?>
      </div>
    </div>

    <div id="exec" class="row">

      <div class="col l3 m6 s6">
        <div class="card" id="hlee">
          <div class="card-image">
            <img src='images/exec/hlee.jpg' width="195px">
          </div>
          <div class="card-content">
            <p>Harlin Lee</p>
            <p>President</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="kng">
          <div class="card-image">
            <img src='images/exec/kng.jpg' width="195px">
          </div>
          <div class="card-content">
            <p>Kevin Ng</p>
            <p>Vice President</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="igarza">
          <div class="card-image">
            <img src="images/exec/igarza.jpg" width="195px">
          </div>
          <div class="card-content">
            <p>Isaac Garza</p>
            <p>Co-Treasurer</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="pzhao">
          <div class="card-image">
            <img src="images/exec/pzhao.jpg">
          </div>
          <div class="card-content">
            <p>Parker Zhao</p>
            <p>External Relations</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="clao">
          <div class="card-image">
            <img src="images/exec/clao.jpg">
          </div>
          <div class="card-content">
            <p>Czarina Lao</p>
            <p>Secretary</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="schen">
          <div class="card-image">
            <img src="images/exec/schen.jpg">
          </div>
          <div class="card-content">
            <p>Shirley Chen</p>
            <p>Social Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="makengin">
          <div class="card-image">
            <img src="images/exec/makengin.jpg">
          </div>
          <div class="card-content">
            <p>Efe Akengin</p>
            <p>Social Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="mlao">
          <div class="card-image">
            <img src="images/exec/mlao.jpg">
          </div>
          <div class="card-content">
            <p>Natalie Lao</p>
            <p>Chairwoman</p>
          </div>
        </div>
      </div>
      
      <div class="col l3 m6 s6">
        <div class="card" id="hmoncivais">
          <div class="card-image">
            <img src="images/exec/hmoncivais.png">
          </div>
          <div class="card-content">
            <p>Hiram Moncivais</p>
            <p>Historian</p>
          </div>
        </div>
      </div>
      
      <div class="col l3 m6 s6">
        <div class="card" id="kikhofua">
          <div class="card-image">
            <img src="images/exec/kikhofua.jpg">
          </div>
          <div class="card-content">
            <p>Kamoya Ikhofua</p>
            <p>Publicity Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="lchen">
          <div class="card-image">
            <img src="images/exec/lchen.jpg">
          </div>
          <div class="card-content">
            <p>Lucy Chen</p>
            <p>Publicity Chair</p>
          </div>
        </div>
      </div>

      <div class="col l3 m6 s6">
        <div class="card" id="cwomack">
          <div class="card-image">
            <img src="images/exec/cwomack.jpg">
          </div>
          <div class="card-content">
            <p>Chris Womack</p>
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
