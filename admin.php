<?php

    include("vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\Auth;

    $user = Auth::check();

    $table = new UsersTable(new MySQL);
    $rows = $table->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Admin</title>
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
            <?php foreach($rows as $row): ?>
                <tr>
                    <td><?= $row->id ?></td>
                    <td><?= $row->name ?></td>
                    <td><?= $row->email ?></td>
                    <td><?= $row->phone ?></td>
                    <td>
                        <?php if($row->role_id == 3): ?>
                            <span class="badge bg-success">
                        <?php elseif($row->role_id == 2) : ?>
                            <span class="badge bg-primary">
                        <?php else : ?>
                            <span class="badge bg-secondary">
                        <?php endif ?>
                            <?= $row->role ?>
                        </span>                            
                    </td>
                </tr>
        </table>
    </div>
</body>
</html>