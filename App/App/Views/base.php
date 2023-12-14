<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css" />
</head>
<body>
<?php use App\Auth;

$current_user= Auth::getUser();
?>
<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if($current_user): ?>
                <li class="nav-item"><a class="nav-link" href="/profile/show">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="/logout">Log out</a></li>
            <?php endif ?>
        </ul>
    </nav>
        </div>
</nav>

</div>
</body>