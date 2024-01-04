<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Blood - Edit Data</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            max-width: 100%;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 16px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>Edit driver</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('lastblood/update/' . $lastblood_data->id); ?>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo set_value('name', $lastblood_data->name); ?>"><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo set_value('email', $lastblood_data->email); ?>"><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo set_value('phone', $lastblood_data->phone); ?>"><br>

        <label for="password">Password:</label>
        <input type="password" name="password"><br>

        <label for="gender">Gender:</label>
        <select name="gender">
            <option value="male" <?php echo ($lastblood_data->gender == 'male') ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?php echo ($lastblood_data->gender == 'female') ? 'selected' : ''; ?>>Female</option>
        </select><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
