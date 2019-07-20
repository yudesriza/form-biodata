<form method="POST" action="">
<input type="date" name="start_date"><br>
<input type="date" name="end_date">
<input type="submit" name="submit">
</form>


<?php 
if (isset($_POST['submit'])) {
	betweenDays($_POST['start_date'],$_POST['end_date']);
}
 ?>

<?php
	
function betweenDays($start_date,$end_date)
{
	// Set timezone
	date_default_timezone_set('UTC');

	while (strtotime($start_date) <= strtotime($end_date)) {
                echo "$start_date<br>";
                $start_date = date ("Y-m-d", strtotime("+1 day", strtotime($start_date)));
	}
}
	

?>

