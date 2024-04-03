<?php
session_start();
requireValidSession(true);

$exception = null;
$userDate = [];

if(count($_POST) === 0 && isset($_GET['update'])) {
    $user = User::getOne(['id'=> $_GET['update']]);
    $userDate = $user->getValues();
    $userDate['password'] = null;
} elseif(count($_POST) > 0){
    try {
        $dbUser = new User($_POST);
        if($dbUser->id) {
            $dbUser->update();
            addSuccessMsg("Usuário alterado com sucesso");
            header("Location: users.php");
            exit();
        } else {
            $dbUser->insert();
            addSuccessMsg("Usuário cadastrado com sucesso");
        }
        $_POST = [];
    } catch (Exception $e) {
        $exception = $e;
    } finally {
        $userDate = $_POST;
    }
}

loadTemplateView("save_user",  $userDate + ['exception' => $exception]);