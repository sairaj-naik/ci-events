
<form action="<?php echo site_url('events/insertEventDetails'); ?>" method="post">
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
