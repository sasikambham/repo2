
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Drivers</title>
</head>
<body>
    <h2>List of Drivers</h2>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
        <?php foreach ($drivers as $driver): ?>
        <tr>
            <td><?= $driver['name']; ?></td>
            <td><?= $driver['email']; ?></td>
            <td><?= $driver['phone_number']; ?></td>
            <td><?= $driver['gender']; ?></td>
            <td>
                <a href="<?= base_url('driver/edit/' . $driver['id']); ?>">Edit</a>
                <a href="<?= base_url('driver/delete/' . $driver['id']); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>

    <a href="<?= base_url('driver/create'); ?>">Add New Driver</a>
    <br>
    <a href="<?= base_url('driver/login'); ?>">Login</a>
</body>
</html>
