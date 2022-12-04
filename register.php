<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
</head>
<body>
    <div class="container mt-5" style="max-width: 600px">
        <h1 class="h4 text-center">Register</h1>

        <form action="_actions/create.php" method="post">
            <input type="text" class="form-control mb-2" name="name" placeholder="name" required>
            <input type="email" class="form-control mb-2" name="email" placeholder="email" required>
            <input type="text" class="form-control mb-2" name="phone" placeholder="phone" required>
            <textarea name="address" class="form-control mb-2" placeholder="Address" required></textarea>
            <input type="password" class="form-control mb-2" name="password" placeholder="Password" required>

            <button class="btn btn-primary w-100">Register</button>

            <a href="index.php">Login</a>
        </form>
    </div>
</body>
</html>