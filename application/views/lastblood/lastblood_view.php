<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Blood Data</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   <?php if($this->session->flashdata('status')): ?>
    <div style="background-color: #4caf50; color: #fff; padding: 10px; border-radius: 4px; margin-bottom: 20px;">
        <?= $this->session->flashdata('status'); ?>
    </div>
<?php endif; ?>


    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px; /* Set the maximum width for medium-sized screens */
            width: 100%; /* Make the container responsive */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .update-btn {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-btn:hover {
            background-color: #2980b9;
        }

        .add-new-record, .logout {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            padding: 8px 16px;
            background-color: #4caf50;
            color: #fff;
            border-radius: 4px;
        }

        .add-new-record:hover, .logout:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">

        <h2>Driver Data</h2>

        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            <?php if (!empty($lastblood_data)): ?>
                <?php foreach ($lastblood_data as $data): ?>
                    <tr>
                        <td><?= $data->name ?></td>
                        <td><?= $data->email ?></td>
                        <td><?= $data->phone ?></td>
                        <td><?= $data->gender ?></td>
                        <td>
                            <span class="status" data-status="<?= $data->status ?>" data-id="<?= $data->id ?>">
                                <?= ($data->status == 1) ? 'Active' : 'Inactive'; ?>
                            </span>
                            <button class="update-btn" type="button">Status</button>
                        </td>
                        <td>
                            <a href="<?= base_url('lastblood/edit/' . $data->id) ?>">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No employees found.</td>
                </tr>
            <?php endif; ?>

        </table>

        <p class="add-new-record"><a href="<?= base_url('lastblood/create') ?>">Add New Record</a></p>
        <p class="logout"><a href="<?= base_url('lastblood/logout') ?>">Logout</a></p>

    </div>

    <script>
        $(document).ready(function(){
            $('.update-btn').click(function(e) {
                e.preventDefault();

                var statusElement = $(this).closest('tr').find('.status');
                var status = statusElement.data('status');
                var employeeId = statusElement.data('id');

                status = (status == 1) ? 0 : 1;

                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("lastblood/update_status/") ?>' + employeeId,
                    data: {id: employeeId, status: status},
                    success: function(response) {
                        console.log('AJAX Success:', response);
                        statusElement.text((status == 1) ? 'Active' : 'Inactive');
                        statusElement.data('status', status);
                    },
                    error: function(error) {
                        console.error('AJAX Error:', error);
                    }
                });
            });
        });
    </script>

</body>
</html>
