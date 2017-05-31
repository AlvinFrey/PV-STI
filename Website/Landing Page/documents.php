  <!DOCTYPE html>
  <html>
    <head>

      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/main.css"/>
      <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
      <meta charset="utf-8"/>
      <title>Documents - PV@STI</title>

      <link rel="shortcut icon" href="img/icons/favicon.ico" type="image/x-icon" />
      <link rel="apple-touch-icon" sizes="57x57" href="img/icons/apple-touch-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="img/icons/apple-touch-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="img/icons/apple-touch-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="img/icons/apple-touch-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="img/icons/apple-touch-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="img/icons/apple-touch-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="img/icons/apple-touch-icon-180x180.png">
      <link rel="icon" type="image/png" href="img/icons/favicon-16x16.png" sizes="16x16">
      <link rel="icon" type="image/png" href="img/icons/favicon-32x32.png" sizes="32x32">
      <link rel="icon" type="image/png" href="img/icons/favicon-96x96.png" sizes="96x96">
      <link rel="icon" type="image/png" href="img/icons/android-chrome-192x192.png" sizes="192x192">
      <meta name="msapplication-square70x70logo" content="img/icons/smalltile.png" />
      <meta name="msapplication-square150x150logo" content="img/icons/mediumtile.png" />
      <meta name="msapplication-wide310x150logo" content="img/icons/widetile.png" />
      <meta name="msapplication-square310x310logo" content="img/icons/largetile.png" />

    </head>

    <body>

      <nav>
        <div class="nav-wrapper z-depth-1">
          <a href="index.php" class="brand-logo">PV@STI</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="documents.php">Documents</a></li>
            <li><a href="about.php">Présentation du projet</a></li>
            <li><a href="system.php">Fonctionnement</a></li>
            <li><a href="#" target="_blank">Monitoring</a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="documents.php">Documents</a></li>
            <li><a href="about.php">Présentation du projet</a></li>
            <li><a href="system.php">Fonctionnement</a></li>
            <li><a href="#" target="_blank">Monitoring</a></li>
          </ul>
        </div>
      </nav>
      
      <div class="container">

        <div class="row">

          <br/>
          <br/>

          <center>

          <?php

            if ($handle = opendir('documents')){

              while (false !== ($file = readdir($handle))){

                if ($file != "." && $file != ".."){

                  if(preg_match("/^.*\.(jpg|jpeg|png|gif)$/i", $file)){

                    echo "<a href='documents/".$file."' target='_blank'><img src='documents/".$file."' class='documentTile'></img></a>\n";
                  
                  }else{

                    echo "<a href='documents/".$file."' target='_blank'><img src='https://placeholdit.imgix.net/~text?txtsize=33&txt=".urlencode($file)."&w=350&h=200' class='documentTile'></img></a>\n";
                  
                  }
                
                }
              
              }
              
              closedir($handle);
            
            }

          ?>

        </div>

        <br/>

        <p class="light">Fait par le groupe PV@STI au lycée Lazare de Schwendi d'Ingersheim</p>

        </center>

      </div>

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
    </body>
  </html>