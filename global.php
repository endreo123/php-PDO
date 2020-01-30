<?php

    require_once 'classes/config.php';

    spl_autoload_register('carregarClasse');

    function carregarClasse($nomeDaClasse)
    {
        $diretorio = 'classes/'. $nomeDaClasse . '.PHP';

        if (file_exists($diretorio)){
            require_once $diretorio;
        }

    }

?>