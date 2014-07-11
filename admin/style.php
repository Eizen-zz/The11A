<link href="
<?
$std = date("G");

$day = "/day.css";
$night = "/night.css";

if ($std >= 3 && $std < 18) // время с 6.00 до 20.59
echo $day;
else 
echo $night;
?>
" rel="stylesheet" type="text/css">

<script src="
<?
$std = date("G");

$day = "/js/buttons.js";
$night = "/js/buttonsn.js";

if ($std >= 3 && $std < 18) // время с 6.00 до 20.59
echo $day;
else 
echo $night;
?>
"></script>