<html>
<head>
    <title>Login Page</title>
</head>
<body>
<form action="<?=base_url();?>login/process" method="post">
    <h1>Login</h1>
    <?php
        echo '<span style="color:red">'.@$_SESSION['error'].'</span>';
    ?>
    <div>
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" required>
    </div>
    <div>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <input type="submit" name="Login">
    </div>
</form>
</body>
</html>
