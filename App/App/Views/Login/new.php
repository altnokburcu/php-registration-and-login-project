<?php include __DIR__ . '/../base.php'; ?>

<head>
    <title>Login page</title>
    <link rel="stylesheet" href="/css/styles.css" />

</head>
<?php use App\Flash;
Flash::getMessages();
 ?>
<h1>Log in</h1>

<form action="/login/create" method="post">

    <div class="form-group">
        <label for="inputEmail">Email address</label>
        <input id="inputEmail" name="email" placeholder="email address" autofocus class="form-control" />
    </div>

    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" id="inputPassword" name="password" placeholder="Password"
               required class="form-control"  />
    </div>

    <div class="checkbox">
<label>
    <input type="checkbox" name="remember_me"
           <?php $remember_me =  isset($_POST['remember_me']);
           if ($remember_me): ?>checked="checked"<?php endif; ?>/>Remember me
</label>
    </div>
    <button type="submit" class="btn btn-default">Login</button>
    <a href="/password/forgot">Forgot password?</a>

</form>


</body>

</html>
