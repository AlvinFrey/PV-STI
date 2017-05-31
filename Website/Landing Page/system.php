  <!DOCTYPE html>
  <html>
    <head>

      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/main.css"/>
      <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
      <meta charset="utf-8"/>
      <title>Fonctionnement - PV@STI</title>

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

        <br/>

        <h5><b>Suiveur Solaire : </b></h5>

        <br/>

        <p>Le suiveur solaire utilise deux cellules photovoltaïques disposés à gauche et à droite du panneau. Ils sont <b>solidement fixés sur un support modélisé et imprimé en 3D.</b></p>
        <p>Les cellules sont <b>directement branchés sur des ports analogiques de l'Arduino Uno.</b> Nous pensions <b>utiliser des photo-résistances mais elle saturaient au soleil et il était impossible de voir un changement d'intensité entre les deux cellules.</b></p>
        <p>Le programme <b>vérifie donc les ports analogiques</b> et quand un port est <b>plus alimenté que l'autre, on fait tourner le moteur dans le bon sens</b> à l'aide d'un driver de moteur.</p>

        <br/>

        <a href="img/projet/Suiveur/Suiveur.jpg" target="_blank"><img src="img/projet/Suiveur/Suiveur.jpg" class="systemDiagram"></img></a>

        <a href="img/projet/Suiveur/Diagramme Suiveur.jpg" target="_blank"><img src="img/projet/Suiveur/Diagramme Suiveur.jpg" class="systemDiagram"></img></a>

        <br/>
        <br/>

        <h5><b>Suivi de la production et de la consommation : </b></h5>

        <br/>

        <p>Le système de suivi est un peu plus compliqué, en effet nous utilisons un <b>module wifi ESP8266, c'est un module qui coute environ 10EUROS</b> et qui est très simple d'utilisation par rapport aux shields Wifi.</p>
        <p>Nous utilisons également des <b>deux capteurs de tension, deux capteurs de courant, un capteur de luminosité ainsi qu'une entrée téléinformation (récupération des données des compteurs EDF).</b></p>
        <p>Tous ces capteurs sont branchés à l'Arduino Mega. Le programme va <b>récupérer les valeurs de tous nos capteurs et les stockées dans un fichier type JSON (voir photos).</b></p>
        <p>Une fois ces données stockées dans le fichier, on <b>établit une connexion avec le site web</b> et on <b>envoie les données vers une page qui va traiter les données</b> et les envoyées dans une base de données pour ensuite être affiché sur l'interface Web</p>

        <br/>

        <a href="img/projet/Panel/Traduction JSON.png" target="_blank"><img src="img/projet/Panel/Traduction JSON.png" class="systemDiagram"></img></a>

        <a href="img/projet/Panel/Diagramme.png" target="_blank"><img src="img/projet/Panel/Diagramme.png" class="systemDiagram"></img></a>

        <br/>
        <br/>

        <p class="light">Fait par le groupe PV@STI au lycée Lazare de Schwendi d'Ingersheim</p>

      </div>

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
    </body>
  </html>