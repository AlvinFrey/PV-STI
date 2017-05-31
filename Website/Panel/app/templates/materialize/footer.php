
    <br/>

    <p class="light">Fait par le groupe PV@STI au lycée Lazare de Schwendi d'Ingersheim</p>

</div>

<?php

    use Helpers\Assets;
    use Helpers\Url;
    use Helpers\Hooks;

    $hooks = Hooks::get();

    $jsFileArray = array(
        '//code.jquery.com/jquery-1.12.0.min.js', 
        Url::templatePath() . 'js/materialize.js', 
        Url::templatePath() . 'js/main.js'    
    );

    if (isset($data['javascript'])){
        foreach ($data['javascript'] as &$jsFile) {
            array_push($jsFileArray, URL::templatePath() . "js/" . $jsFile . ".js");
        }
    }

    Assets::js($jsFileArray);

    $hooks->run('js');
    $hooks->run('footer');

?>

</body>
</html>
