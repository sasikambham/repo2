<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 300px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($error)): ?>
    <p style="color: red;"><?= $error; ?></p>
    <?php endif; ?>

    <?php echo form_open('lastblood/authenticate'); ?>
        <label>Email or phone:</label>
        <input type="text" name="identity" required autocomplete="off">

        <label>Password:</label>
        <input type="password" name="password" required autocomplete="off">

        <input type="submit" value="Login">
    <?php echo form_close(); ?>
</body>
</html>
