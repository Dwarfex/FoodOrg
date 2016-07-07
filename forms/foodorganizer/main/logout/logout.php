<?php
if (isset($_SESSION['urlUnableToAccess'])) {
    $urlUnableToAccess = $_SESSION['urlUnableToAccess'];
}
    seEndSession($seSessionMaster);

    if (isset($_POST['seUserLoginMobileApp'])) {
        $seAjaxController->addData('logout', '1');
        $seAjaxController->answer();
    } else {


        navigate('/foodorganizer');

    }

