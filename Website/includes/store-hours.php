<?php 


date_default_timezone_set('Europe/Belgrade'); 

// Define daily open hours

$hours = array(
    'mon' => array('00:00-00:00'),
    'tue' => array('13:00-21:00'),
    'wed' => array('13:00-21:00'),
    'thu' => array('13:00-21:00'),
    'fri' => array('16:00-23:00'),
    'sat' => array('16:00-23:00'),
    'sun' => array('00:00-00:00')
);


$exceptions = array(
	'Christmas' => '12/25',
	'New Years Day' => '1/1'
);


// Use %open% and %closed% to add dynamic times to your open message.
// %open% and %closed% will not work if you have multiple time ranges assigned to a single day.

$open_now = "<strong class='open'>Yes, we're open! Today's hours are %open% until %closed%.</strong>";
$closed_now = "<strong class='closed'>Sorry, we're closed. Today's hours are %open% until %closed%.</strong>";
$closed_all_day = "<strong class='closed'>Sorry, we're closed on %day%.</strong>";
$exception = "<strong class='closed'>Sorry, we're closed for %exception%.</strong>";

// Enter custom time format if using %open% and %closed%

$time_format = 'g:ia';

// The %day% shortcode is replaced by these days of the week.

$days = array(
  'mon' => 'Mondays',
  'tue' => 'Tuesdays',
  'wed' => 'Wednesdays',
  'thu' => 'Thursdays',
  'fri' => 'Fridays',
  'sat' => 'Saturdays',
  'sun' => 'Sundays'
);


// -------- END EDITING -------- 

$day = strtolower(date("D"));
$today = strtotime('today midnight');
$now = strtotime(date("G:i"));
$is_open = false;
$is_exception = false;
$is_closed_all_day = false;



// Check if closed all day
if($hours[$day][0] == '00:00-00:00') {
	$is_closed_all_day = true;
}

// Check if currently open
foreach($hours[$day] as $range) {
	$range = explode("-", $range);
	$start = strtotime($range[0]);
	$end = strtotime($range[1]);
	if (($start <= $now) && ($end >= $now)) {
		$is_open = true;
	}
	else {
		$is_open = false;
	}

	
}

// Check if today is an exception
foreach($exceptions as $ex => $ex_day) {
	$ex_day = strtotime($ex_day);
	if($ex_day === $today) {
		$is_open = false;
		$is_exception = true;
		$the_exception = $ex;
	}
}

if($is_exception) {
	$exception = str_replace('%exception%', $the_exception, $exception);
	echo $exception;
} elseif($is_closed_all_day) {
	$closed_all_day = str_replace('%day%', $days[$day], $closed_all_day);
	echo $closed_all_day;
} elseif($is_open) {
	$open_now = str_replace('%open%', date($time_format, $start), $open_now);
	$open_now = str_replace('%closed%', date($time_format, $end), $open_now);
	echo $open_now;
} else {
	$closed_now = str_replace('%open%', date($time_format, $start), $closed_now);
	$closed_now = str_replace('%closed%', date($time_format, $end), $closed_now);
	echo $closed_now;
}

?>




