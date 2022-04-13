<!doctype html>
<html lang="pt-br">
<head>
    <link href="<?= url("assets/scss/style.css") ?>" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex,nofollow">
    <title>login</title>
</head>
<body style="height: 100vh;">


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <form action="<?= url("admin/login"); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_input() ?>
            <?= ($message) ? $message : "" ?>
            <input type="text" id="login" class="fadeIn second" name="username" placeholder="login" required autocomplete="off">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="entrar">
        </form>
    </div>
</div>

</body>
</html>