<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
     <link rel="stylesheet" href="<?=base_url();?>public/css/style2.css">
</head>
<body>
    <div class="container">
        <h1>Update Record</h1>
        <form action="<?=site_url('user/update/'.$student['id']);?>" method="post">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?=html_escape($student['last_name']);?>">

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?=html_escape($student['first_name']);?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?=html_escape($student['email']);?>">

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>