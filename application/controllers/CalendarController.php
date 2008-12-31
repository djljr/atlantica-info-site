<?php

class CalendarController extends Zend_Controller_Action
{	
	public function gametimeAction()
	{
		$this->view->gametime = $this->getGameTimeFromTimestamp(time());
	}
	
	protected function getTimestampFromGameTime($year, $month, $day, $hour)
	{
		$time0 = 1170457299;
		$year_sec = 1036800;
		$month_sec = 86400;
		$day_sec = 2880;
		$hour_sec = 120;
		
		return $time0 + $year * $year_sec + $month * $month_sec + $day * $day_sec + $hour * $hour_sec;
	}
	
	protected function getGameTimeFromTimestamp($ts)
	{
		$gametime = array();
		
		$time0 = 1170457299;
		$atlantica_ts = $ts - $time0;
		$day_hour= 24;
		$month_day = 30;
		$year_month = 12;
		$hour_sec = 120;
		
		$tmp_ts = $atlantica_ts;
		$hours = $this->int_divide($tmp_ts, $hour_sec);
		
		
		$days = $this->int_divide($hours, $day_hour);
		$hours = $hours - $days * $day_hour;
		$gametime['hour'] = $hours;
		
		$months = $this->int_divide($days, $month_day);
		$days = $days - $months * $month_day;
		if($days == 0)
		{
			$days = 30;
			$months = $months - 1;
		}
		$gametime['day'] = $days;
		
		$years = $this->int_divide($months, $year_month);
		$months = $months - $years * $year_month;
		if($months == 0) 
		{
			$months = 12;
			$years = $years - 1;
		}
		$gametime['month'] = $months;
		$gametime['year'] = $years;
		
		$gametime['repr'] = $hours . " hrs " . $months . "/" . $days . "/" . $years;
		return $gametime;
	}
	
	protected function int_divide($x, $y) {
	    if ($x == 0) return 0;
	    if ($y == 0) return FALSE;
	    return ($x - ($x % $y)) / $y;
	}	
}