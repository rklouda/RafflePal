    <?php
     ob_start();
     session_start();
     include 'connect.php';
     
     // if session is not set this will redirect to login page
     if( isset($_SESSION['user']) ) {
    
     // select loggedin users detail
     $res=mysqli_query($db,"SELECT * FROM AGENT WHERE Agent_ID=".$_SESSION['user']);
     $userRow=mysqli_fetch_array($res); 
         
     }
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
    <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />-->
    <link rel="stylesheet" href="style.css" type="text/css" />
    <!link href="https://www.secure-apps.smartapp1003.com/css/app.css" rel="stylesheet">
   <link rel="stylesheet" href="styletemplate.css" type="text/css" />
    </head>
    <body>
    
     <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
             <a><img src="/HelpNowlogo1.png" width="50" height="50" alt="MyLogo" border="0" /></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
    
    
    <?php
    
    if (isset($_SESSION['user'])) { ?>
         <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                 <li><a href="Agents.php">Agents</a></li>
                 <li><a href="clients.php">Clients</a></li>
                 <li><a href="team.php">The Development Team</a></li>
                 <li><a href="aidRequest.php">Request Aid</a></li>
              </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
         <span class="glyphicon glyphicon-user"></span>&nbsp;Hi <?php echo $userRow['First_Name']; ?>&nbsp;<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                  </ul>
                </li>
    <?php 
    } else { ?>
       <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                 <li><a href="team.php">The Development Team</a></li>
              </ul>
               <ul class="nav navbar-nav navbar-right">
                
                <li class="dropdown">
                  <a href="login.php" role="button" >Login</a>
                </li>
              </ul>
    <?php 
    }
    
    
    
    ?>
    
    
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav> 
    
     <div id="wrapper">
    <div class="aboutGradient"
     <div class="container">
        
        
            <h1 class="textTitle">About Us</h1>
            <h2 class="text">HelpNow is an organization that helps individuals in emergency situations acquire the funds they need in order to continue living healthy and happy lives. HelpNow helps these individuals by providing emergency monetary funding for dire situations. These funds can be used for things like necessary healthcare procedures or to help pay overdue bills. HelpNow even has a policy that allows clients to be able to attain funds to purchase groceries for their families. These emergency funds are capable of giving individuals and families the breathing room they need in order to create successful and fulfilling lives.</h2>
            <h3 class="text2"> Contact us today in order to schedule an appointment with an agent near you. We are ready to help you, now.</h3>
            <div class="page-header">
                 
                 <img class="aboutLogo" src="images/HelpNow Logo HD Dark Grey resized.png" alt="logo"></img>
        </div>
        </div>
        
        </div>
        
        </div>
        
    <!-- dependencies (jquery, handlebars and bootstrap) -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.3/handlebars.min.js"></script>
    <link type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
     
    </body>
    </html>
    <?php ob_end_flush(); ?>