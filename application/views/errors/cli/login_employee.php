
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

</head>

<body>
        <h2>Login</h2>                

        <?php echo form_open('auth/login'); ?>

        <label for="username">Employee Id:</label>

        <input type="text" name="employee_id" required>

        <label for="password">Password:</label>

        <input type="password" name="password" required>

        <button type="submit">Login</button>

        <?php echo form_close(); ?>
</body>

</html>
