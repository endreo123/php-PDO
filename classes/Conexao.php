<?php


    class Conexao
    {
        public static function pegarConexao()
        {
            $conexao = new PDO(DB_DRIVE .':host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASSWORD);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexao;
        }
    }



?>