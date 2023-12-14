<?php include __DIR__ . '/../base.php'; ?>

<head>
    <title>Reset password</title>

</head>
<script src="public/js/hideShowPassword.min.js"></script>
<script src="public/js/app.js"></script>


<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>

<script>


    $(document).ready(function() {

        /**
         * Validate the form
         */
        $('#formPassword').validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6,
                    validPassword: true
                }
            }
        });


        /**
         * Show password toggle button
         */
        $('#inputPassword').hideShowPassword({
            show: false,
            innerToggle: 'focus'
        });
    });
</script>

<body>

<?php if (!empty($user->errors)): ?>
    <ul>
        <?php foreach ($user->errors as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" id="formPassword" action="/password/reset-password">
    <input type="hidden" name="token" value="<?php echo $token ?>">
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" id="inputPassword" name="password" placeholder="Password" required
        class="form-control"/>
    </div>

    <button type="submit" class="btn btn-default">Reset password</button>

</form>

</body>
</html>