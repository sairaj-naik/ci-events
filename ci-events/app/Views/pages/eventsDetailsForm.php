<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo site_url('users/insertEventDetails'); ?>" method="post">
        <div>
            <label>Event Name</label>
        <input type="text" name="eventname" placeholder="Enter Event Name" />
        </div>
        <div>
            <label>Date</label>
        <input type="date" name="date" />
        </div>
        <div>
            <input type="submit" name="submit" value="Submit" />
        </div>
        
    </form>
</body>
</html>