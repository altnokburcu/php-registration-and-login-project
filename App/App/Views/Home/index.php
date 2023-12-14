<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style></style>
    <link rel="stylesheet" href="/css/styles.css?v=<?php echo time(); ?>" />

</head>
<body>
<?php
use App\Flash;
include __DIR__ . '/../base.php';
Flash::getMessages();

?><div class="container">
    <h1>Welcome</h1>
    <?php if(isset($_SESSION['user_id'])):?>
        <?php echo $user->name; ?> logged in.  <a href="/logout">Log out</a>.
    <?php else: ?>
    <a href="/Signup/new">Sign up</a> or <a href="/login">Login</a>
<?php endif ?>
</div>
</body>
</html>
