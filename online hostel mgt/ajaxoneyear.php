<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT);
?>
<input class="form-control" type="date" placeholder="End Date" name="end_date" value="<?php echo date('Y-m-d', strtotime($_GET['startdate']. ' + 1 year')); ?>" readonly >
