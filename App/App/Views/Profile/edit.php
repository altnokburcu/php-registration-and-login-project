<?php include __DIR__ . '/../base.php'; ?>

<head>
    <title>Profile</title>
</head>
<script src="public/js/hideShowPassword.min.js"></script>
<script src="public/js/app.js"></script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>


<script>

    $(document).ready(function() {

        var userId= <?php echo $user->id; ?>;
        console.log(userId);
        /**
         * Validate the form
         */
        $('#formProfile').validate({
            rules: {
                name: 'required',
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: '/account/validate-email',
                        data: {
                            ignore_id: function() {
                                return userId;
                            }
                        }
                    }                },
                password: {
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
<h1>Profile</h1>

<?php if (!empty($user->errors)): ?>
    <ul>
        <?php foreach ($user->errors as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

    <form method="post" action="/profile/update" id="formProfile">

        <div class="form-group">
            <label for="inputName">Name</label>
            <input id="inputName" name="name" placeholder="Name" class="form-control" />
        </div>
        <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input id="inputEmail" name="email" placeholder="email address" class="form-control" />
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" id="inputPassword" name="password" placeholder="Password"
                   aria-describedby="helpBlock" class="form-control"/>
            <span id="helpBlock" class="help-block ">Leave blank to keep current password</span>
        </div>

        <button type="submit" class="btn btn-default">Save</button>
        <a href="/profile/show">Cancel</a>

    </form>


</body>

</html>
