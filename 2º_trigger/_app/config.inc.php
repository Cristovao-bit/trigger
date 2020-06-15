<?php

// CONFGURAÇÃO DE SITE ####################
// AUTO LOAD DE CLASSE ####################
function __autoload($Class) {
    $dirName = 'class';

    if (file_exists("{$dirName}/{$Class}.class.php")):
        require_once("{$dirName}/{$Class}.class.php");
    else:
        die("Erro ao incluir {$dirName}/{$Class}.class.php<hr>");
    endif;
}

// TRATAMENTO DE ERROs ####################
// CSS constantes :: Mensagens de Erro
define('WS_SUCCESS', 'trigger-success');
define('WS_INFOR', 'trigger-infor');
define('WS_ALERT', 'trigger-alert');
define('WS_ERROR', 'trigger-error');

//WSErro :: Exibe erros lançados :: Front
function WSErro($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
    echo "<p class=\"trigger {$CssClass}\">{$ErrMsg}<span class=\"ajax_close\"></span></p>";

    if ($ErrDie):
        die;
    endif;
}

//PHPErro :: personaliza o gatilho do PHP
function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
    echo "<p class=\"trigger {$CssClass}\">";
    echo "<b>Erro na Linha: {$ErrLine} ::</b> {$ErrMsg}<br>";
    echo "<small>{$ErrFile}</small>";
    echo "<span class=\"ajax_close\"></span></p>";

    if ($ErrNo == E_USER_ERROR):
        die;
    endif;
}

set_error_handler('PHPErro');