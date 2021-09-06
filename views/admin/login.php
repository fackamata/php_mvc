<?php
$error_html = "";
$form = new \App\HTML\BootstrapForm($_POST);
if (!empty($_POST)) {
    $user = $auth->login($_POST["email"], $_POST["password"]);
    // \App\Utils::var_dump_pre($user); // => return user = false sinon l'objet user
    if ($user) {
        header("Location:./admin.php?p=home");
    } else {
        $error_html = <<<'EOT'
        <div class="col-12">
        <div class="alert alert-danger mt-2">
            Wrong Email and/or Password !
        </div>
        </div>
        EOT;
    }
}
?>
<div class="row">
    <div class="col-12">
        <h1>FORM LOGIN HERE !</h1>
    </div>
    <?= $error_html ?>
    <div class="col-12">
        <form action="admin.php" method="POST" class="mb-3">
            <?php
            echo $form->input("email", "email", true);
            echo $form->input("password", "password", true);
            echo $form->submit();
            ?>
        </form>
    </div>
</div>