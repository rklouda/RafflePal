<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Help Now - Home</title>
<!-- dependencies (jquery, handlebars and bootstrap) -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.3/handlebars.min.js"></script>
<link type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"/>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />-->
<link rel="stylesheet" href="style.css" type="text/css" />
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
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
             <li><a href="Agents.php">Agents</a></li>
             <li><a href="clients.php">Clients</a></li>
             <li><a href="team.php">The Development Team</a></li>
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
            <li><a href="home.php">Home</a></li>
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

 <div class="container">
      
      
     
     <div class="page-header">
          <img class="logo" src="/helpnowlogo2.png" alt="logo"></img>
     
    </div>
        <div class="row">
           
        <div class="col-lg-12">
       
        </div>
        </div>
       
    <img class="cover" src="/helpnowcover.jpg" alt="logo"></img>
    
    </div>
    
    </div>

</div>

</body>
</html>
