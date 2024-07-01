<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php echo validation_errors(); ?>
    <?php if(isset($error)) echo $error; ?>
    <?php echo form_open('auth/login'); ?>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" name="login" value="Login">
    <?php echo form_close(); ?>
</body>
</html>
