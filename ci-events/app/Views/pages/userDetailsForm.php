<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo site_url('users/insertUserDetails'); ?>" method="post">
        <div>
            <label>Name</label>
        <input type="text" name="name"placeholder="Enter your Name" />
        </div>
        <div>
            <label>Email</label>
        <input type="email" name="email"placeholder="Enter your Email Address" />
        </div>
        <div>
            <input type="submit" name="submit" value="Submit" />
        </div>
        
    </form>
</body>
</html>