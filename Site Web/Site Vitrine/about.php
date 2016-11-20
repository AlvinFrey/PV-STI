  <!DOCTYPE html>
  <html>
    <head>

      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/main.css"/>
      <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
      <meta charset="utf-8"/>
      <title>À propos - PV@STI</title>

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

        <h5><b>Notre Groupe : </b></h5>

        <br/>

        <p>Nous sommes actuellement 4 personnes à travailler sur le projet.</b></p>
        <p>Camille s'occupe de l'implantation des batteries.</p>
        <p>Mickaël s'occupe quand à lui de la possibilité de revendre l'énergie à EDF. Camille et Mickaël se sont aussi aussi occupé du support pour notre grand panneau solaire.</p>
        <p>Alban s'occupe du suiveur solaire mais aussi de la configuration du serveur Web et Alvin s'occupe du suivi de la consommation / production ainsi que du développement de ce site ou de l'interface de suivi.</p>

        <!--<a href="img/IMAGE_GROUPE" target="_blank"><img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=Photo Du Groupe&w=750&h=350" class="systemDiagram" style="width: 750px; height: 350px;"></img></a>-->

        <br/>
        <br/>

        <h5><b>Les problématiques : </b></h5>

        <br/>

        <p>Nous avons reçu deux problématiques, la première étant : <b>"Nous avons un toit plat à disposition que nous aimerions utiliser pour une maison 2.0"</b> la seconde étant <b>d'améliorer l'idée issus de la première problématique.</b></p>
        <p>Pour la première problématique nous avons décidé de <b>remplir ce toit de panneaux photovoltaïques</b>, nous nous étions portés sur l'idée de mettre des panneaux photovoltaïques ET solaires mais l'idée a vite été abandonnée.</p>
        <p>Pour la seconde problématique nous avons décidé de rajouter deux modifications majeures à l'installation photovoltaïque. La première est le <b>suiveur solaire</b>, c'est un système qui permet de <b>suivre le soleil à partir de deux cellules photovoltaïques</b>. La seconde est un <b>suivi de la consommation de la maison et de la production de l'installation photovoltaïque.</b></p>
        <p>Tout ceci étant à intégrer dans une maison "des jeunes" 2.0 qui tendrait vers une habitation BBC voir même à énergie positive si le dimensionnement est le plus optimal possible.</p>

        <br/>

        <a href="img/projet/Problématiques.png" target="_blank"><img src="img/projet/Problématiques.png" class="systemDiagram large"></img></a>

        <br/>
        <br/>

        <h5><b>Suiveur Solaire : </b></h5>

        <br/>

        <p>La seconde solution est de mettre un suiveur solaire qui pourrait <b>augmenter le rendement et la production d'électricité</b> venant de <b>source électriques "naturelles".</b></p>
        <p>Pour cela nous utilisons deux cellules photovoltaïques, une à gauche l'autre à droite. <b>Quand une cellule est plus éclairée on tourne la base tournante accueillant le panneau.</b></p>
        <p>C'est un <b>système simple mais qui a porté ses fruits le tout étant propulsé par un Arduino Uno, un driver de moteur et une base tournante acheté sur le site Phénix Mouvements.</b></p>

        <br/>

        <h5><b>Suivi de la production et de la consommation : </b></h5>

        <br/>

        <p>La première solution pour amener ces problématiques a été la <b>création d'une interface de suivi</b> (ou plus communément appelé Monitoring) qui permet à l'utilisateur de <b>suivre en quasi-temps-réel la production et la consommation de l'installation photovoltaïques.</b></p>
        <p>Ce système rajoute aussi un <b>système d'alerte par SMS ou par mail lorsqu'il y a une surconsommation ou bien lorsque les conditions météo ne sont pas propices pour utiliser les panneaux.</b></p>
        <p>Le but même de cette solution est de permettre à l'utilisateur de <b>reprendre le contrôle sur sa consommation électrique</b>, en effet selon nous, apporter une visualisation des données et un accès total à celles-ci <b>permet à l'utilisateur d'être plus concerné dans la problématique de l'économie d'énergie.</b></p>
        <p>Selon nous <b>si l'utilisateur est guidé / éduqué il pourra mieux gérer ses problèmes de facture à la fin du mois</b> et pourra s'occuper d'autres problèmes.</p>

        <br/>

        <p class="light">Fait par le groupe PV@STI au lycée Lazare de Schwendi d'Ingersheim</p>

      </div>

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
    </body>
  </html>