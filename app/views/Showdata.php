<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showdata</title>
    <link rel="stylesheet" href="<?=base_url();?>public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Student List</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(html_escape($students) as $student): ?>
                <tr>
                    <td><?=$student['id'];?></td>
                    <td><?=$student['last_name'];?></td>
                    <td><?=$student['first_name'];?></td>
                    <td><?=$student['email'];?></td>
                    <td>
                        <a class="btn update" href="<?=site_url('user/update/'.$student['id']);?>">Update</a>
                        <a class="btn delete" href="<?=site_url('user/soft-delete/'.$student['id']);?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn create" href="<?=site_url('user/create');?>">Add New Student</a>
    </div>
</body>
</html>