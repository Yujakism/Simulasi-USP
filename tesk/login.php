<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login_container">
        <form action="proses_lgn.php" method="post">
            <h1>Login</h1>
            <label>Username:</label><br>
            <input class="user" type="text" name="username" placeholder="Username" required><br><br>
            <label for="label">Password:</label><br>
            <input class="pass" type="password" name="password" placeholder="Password" required><br><br>
            <button class="login" type="submit">Login</button>
        </form>
    </div>
</body>
</html>