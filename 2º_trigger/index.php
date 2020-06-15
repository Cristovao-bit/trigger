<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Trigger | Manutenção Lira</title>
        <link rel="stylesheet" href="_css/icon.css"/>
        <link rel="stylesheet" href="_css/style.css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"/>
    </head>
    <body>
        <?php
        require ('./_app/config.inc.php');
        
        trigger_error("Essa é uma NOTICE!", E_USER_NOTICE);
        trigger_error("Esse é um ALERT!", E_USER_WARNING);
//        trigger_error("Esse é um ERROR!", E_USER_ERROR);
        
        PHPErro(WS_ERROR, "Esse é um ERROR personalizado!", __FILE__, __LINE__);
        WSErro("Esse é um SUCCESS!", WS_SUCCESS);
        
        try {
            throw new Exception("Essa é uma Exessão!", E_USER_WARNING);
        } catch (Exception $e) {
            PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            WSErro($e->getMessage(), $e->getCode());
            WSErro($e->getMessage(), WS_SUCCESS);
        }
        ?>
    </body>
</html>
