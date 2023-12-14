<?php include __DIR__ . '/../base.php'; ?>

<html>
    <h1>Profile</h1>


    <dl class="row">
        <dt class="col-sm-3">Name</dt>
        <dd class="col-sm-9"> <?php echo $user->name; ?></dd>
        <dt class="col-sm-3">email</dt>
        <dd class="col-sm-9"><?php echo $user->email; ?></dd>
    </dl>

<a href="/profile/edit">Edit</a>
</html>