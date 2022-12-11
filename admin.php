<?php

    include("vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\Auth;

    $auth = Auth::check();

    $table = new UsersTable(new MySQL());
    $all = $table->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-widthinitial-scale=1.0">
    <title>User Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
<body>
<div class="container">
        <h1 class="h3">User Manager</h1>
        <table class="table table-striped">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Role</td>
                <td>#</td>
            </tr>
            <?php foreach($all as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td>
                        <?php if($user->role_id == 3): ?>
                            <span class="badge bg-success">
                        <?php elseif($user->role_id == 2) : ?>
                            <span class="badge bg-primary">
                        <?php else : ?>
                            <span class="badge bg-secondary">
                        <?php endif ?>
                            <?= $user->role ?>
                        </span>                            
                     </td>
                    <td>
                        <?php if($auth->value > 1): ?>
                            <div class="btn-group dropdown">
                                <a href="#" class="btn btn-sm
                                        btn-outline-primary
                                        dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                    Change Role
                               </a>
    <div class="dropdown-menu dropdown-menu-dark">
        <a href="_actions/role.php?id=<?= $user->id ?>&role=1"
            class="dropdown-item">User</a>
        <a href="_actions/role.php?id=<?= $user->id ?>&role=2"
            class="dropdown-item">Manager</a>
        <a href="_actions/role.php?id=<?= $user->id ?>&role=3"
            class="dropdown-item">Admin</a>
    </div>
    <?php if($user->suspended): ?>
        <a href="_actions/unsuspend.php?id=<?= $user->id ?>"
            class="btn btn-sm btn-danger">Suspended</a>
    <?php else: ?>
        <a href="_actions/suspend.php?id=<?= $user->id ?>"
            class="btn btn-sm btn-outline-success">Active</a>
    <?php endif ?>

    <?php if($user->id !== $auth->id): ?>
        <a href="_actions/delete.php?id=<?= $user->id ?>"
            class="btn btn-sm btn-outline-danger"
            onClick="return confirm('Are you sure?')">Delete</a>
    <?php endif ?>
    
</div>

<?php else: ?>
    ###
<?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>