  <!DOCTYPE html>
  <html>
    <head>

      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/main.css"/>
      <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
      <meta charset="utf-8"/>
      <title>Accueil - PV@STI</title>

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

      <div class="parallax-container">
        <div class="row center">
          <a href="about.php" class="waves-effect waves-light btn-large moreButton">Je veux en savoir plus !</a>
        </div>
        <div class="parallax">
          <img src="img/Bannière.png">
        </div>
      </div>
      
     <div class="row">

        <br/>

        <div class="col s12 m4">
          <div class="icon-block">

            <h2 class="center icon-color"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Technologies innovantes</h5>

            <p class="light">Ce projet est propulsé par plusieurs Arduino, une pour le système de monitoring et l'autre pour le système de suiveur solaire.</p>
            <p class="light">Pour le système de suivi de consommation nous utilisons un ESP8266 qui est un module Wifi permettant une connexion rapide et simple à un réseau Wifi.</p>
          
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">

            <h2 class="center icon-color"><i class="material-icons">stay_primary_portrait</i></h2>
            <h5 class="center">Système Multi-plateforme</h5>

            <p class="light">L'interface de suivi de consommation a été développée pour fonctionner sur n'importe quelle plateforme récente que ce soit un ordinateur, un téléphone portable, ou bien une tablette.</p> 
            <p class="light">Ce site est propulsé par une technologie HTML / CSS et permet une compatibilité sur tous les systèmes récents.</p>

          </div> 
        </div>

        <div class="col s12 m4">
          <div class="icon-block">

            <h2 class="center icon-color"><i class="material-icons">supervisor_account</i></h2>
            <h5 class="center">Open-Source et User-Friendly</h5>

            <p class="light">Ce projet est conçu dans une démarche d'accessibilité et d'ouverture des données.</p> 
            <p class="light">Tout notre système dispose d'un code ouvert et libre sur la plateforme Github.</p>
            <p class="light">Nous mettons tout en place pour fournir un accès total sur les données pour une transparence totale.</p>
          
          </div>
        </div>
      </div>

      <br/>

      <p class="light">Fait par le groupe PV@STI au lycée Lazare de Schwendi d'Ingersheim</p>

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
    </body>
  </html>