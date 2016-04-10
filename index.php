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

  
    <link href="css/index.css" rel="stylesheet">
    <link href="css/ieee.css" rel="stylesheet">
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
    

    <div class="welcome">
    	<div class="mask"></div>
	  	<h1 class="welcome-header">MIT IEEE/ACM</h1>
	  	<div class="welcome-text">

        <p>The MIT IEEE/ACM Club represents the student branch for two professional international organizations, the <a href="http://ieee.org">Institute of Electrical and Electronics Engineers</a> (IEEE) and the <a href="http://acm.org">Association for Computing Machinery</a> (ACM). 
        Our mission is to create and support a tight-knit community among the students, mainly undergraduates, and faculty in the Department of Electrical Engineering and Computer Science (EECS) at MIT.
        </p>
  			
  			
  			<p class="s-mailing"><a data-toggle="modal" data-target="#joinUs" data-backdrop="true">JOIN US</a></p>
		  </div>
	  </div>

      <div class="content">
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

        <div id="exec">
          <h1 class="exec-header">The Team</h1>
              <div class="exec-row">
                <div class="student" id="hlee">
                  <img src='images/exec/hlee.jpg' width="195px">
                  <div class="info">
                    <p class="position">President</p>
                    <p class="name">Harlin Lee</p>
                  </div>
                </div>

                <div class="student" id="kng">
                  <img src='images/exec/kng.jpg' width="195px">
                  <div class="info">
                    <p class="position">Vice President</p>
                    <p class="name">Kevin Ng</p>
                  </div>
                </div>

                <div class="student" id="igarza">
                  <img src="images/exec/igarza.jpg" width="195px">
                  <div class="info">
                    <p class="position">Co-Treasurer</p>
                    <p class="name">Isaac Garza</p>
                  </div>
                </div>
              
                <div class="student" id="pzhao">
                  <img src='images/exec/pzhao.jpg' width="195px">
                  <div class="info">
                    <p class="position">External Relations</p>
                    <p class="name">Parker Zhao</p>
                  </div>
                </div>              
              </div>

              <div class="exec-row">
                <div class="student" id="clao">
                  <img src='images/exec/clao.jpg' width="195px">
                  <div class="info">
                    <p class="position">Secretary</p>
                    <p class="name">Czarina Lao</p>
                  </div>
                </div>

                <div class="student" id="eakengin">
                  <img src='images/exec/makengin.jpg' width="195px">
                  <div class="info">
                    <p class="position">Social Chair</p>
                    <p class="name">Efe Akengin</p>
                  </div>
                </div>

                <div class="student" id="schen">
                  <img src='images/exec/schen.jpg' width="195px">
                  <div class="info">
                    <p class="position">Social Chair</p>
                    <p class="name">Shirley Chen</p>
                  </div>
                </div>

                <div class="student" id="mlao">
                  <img src='images/exec/mlao.jpg' width="195px">
                  <div class="info">
                    <p class="position">Chairwoman</p>
                    <p class="name">Natalie Manting Lao</p>
                  </div>
                </div>
                
              </div>
          
              <div class="exec-row">
                

                <div class="student" id="hmoncivais">
                  <img src='images/exec/hmoncivais.png' width="195px">
                  <div class="info">
                    <p class="position">Historian</p>
                    <p class="name">Hiram Moncivais</p>
                  </div>
                </div>

                <div class="student" id="kikhofua">
                  <img src='images/exec/kikhofua.jpg' width="195px">
                  <div class="info">
                    <p class="position">Publicity Chair</p>
                    <p class="name">Kamoya Ikhofua</p>
                  </div>
                </div>
                
                <div class="student" id="lchen">
                  <img src='images/exec/lchen.jpg' width="195px">
                  <div class="info">
                    <p class="position">Publicity Chair</p>
                    <p class="name">Lucy Chen</p>
                  </div>
                </div>

                <div class="student" id="cwomack">
                  <img src='images/exec/cwomack.jpg' width="195px">
                  <div class="info">
                    <p class="position">Webmaster</p>
                    <p class="name">Chris Womack</p>
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

            <p>MIT ACM/IEEE membership is free for all MIT undergraduate and graduate students.  Becoming a member of the MIT ACM/IEEE chapter is a great way to stay informed on upcoming club activities, and we're always looking for more help with our many programs.</p>
            
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
