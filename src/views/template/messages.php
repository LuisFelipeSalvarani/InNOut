<?php 

ini_set("display_errors",0);

$errors =[];

if(isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

if($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];

    if(get_class($exception) === 'ValidationException') {
        $errors = $exception->getErrors();
    }
}

$alertType = '';

if (!empty(($message != null) && ($message['type'] === 'error'))) {
    $alertType = 'danger';
} else {
    $alertType = 'success';
}

?>

<?php if(!empty($message)): ?>
    <div role="alert" class="my-3 alert alert-<?= $alertType ?>">
        <?= $message['message'] ?>
    </div>
<?php endif ?>