<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="<?=base_url();?>public/css/style3.css">
</head>
<body>
    <div class="container">

            <h1>Create Record</h1>
            <form action="<?=site_url('user/create');?>" method="post">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" size="6">

                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" size="6">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" size="6">

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>