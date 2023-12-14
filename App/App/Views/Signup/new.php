<?php include __DIR__ . '/../base.php'; ?>
    <title>Sign up page</title>

</head>
<script src="public/js/hideShowPassword.min.js"></script>
<script src="public/js/app.js"></script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<h1>Sign up</h1>

<script>

    $(document).ready(function() {

        /**
         * Validate the form
         */
        $('#formSignup').validate({
            rules: {
                name: 'required',
                email: {
                    required: true,
                    email: true,
                    remote: '/account/validate-email'
                },
                password: {
                    required: true,
                    minlength: 6,
                    validPassword: true
                }
            },
            messages: {
                email: {
                    remote: 'email already taken!!'
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

    <form method="post" action="/signup/create" id="formSignup">

        <div class="form-group">
            <label for="inputName">Name</label>
            <input id="inputName" name="name" placeholder="Name" autofocus class="form-control"/>
        </div>
        <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input id="inputEmail" name="email" placeholder="email address" class="form-control" />
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" id="inputPassword" name="password" placeholder="Password"
                   required class="form-control"/>
        </div>

        <button type="submit" class="btn btn-default">Sign up</button>

    </form>


</body>

</html>
