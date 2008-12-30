<?php

class CalendarController extends Zend_Controller_Action
{	
	public function gametimeAction()
	{
		$this->view->gametime = $this->getGameTimeFromTimestamp(time());
	}
	
	protected function getGameTimeFromTimestamp($ts)
	{
		$time0 = 1170457299;
		$atlantica_ts = $ts - $time0;
		$year_sec = 1036800;
		$month_sec = 86400;
		$day_sec = 2880;
		$hour_sec = 120;
		$day_hour= 24;
		$month_day = 30;
		$year_month = 12;
		
		$tmp_ts = $atlantica_ts;
		$hours = $this->int_divide($tmp_ts, $hour_sec);
		
		$days = $this->int_divide($hours, $day_hour);
		$hours = $hours - $days * $day_hour;
		
		$months = $this->int_divide($days, $month_day);
		$days = $days - $months * $month_day;
		if($days == 0)
		{
			$days = 30;
			$months = $months - 1;
		}
		
		$years = $this->int_divide($months, $year_month);
		$months = $months - $years * $year_month;
		if($months == 0) 
		{
			$months = 12;
			$years = $years - 1;
		}
		
		$year = $this->int_divide($tmp_ts, $year_sec);		
		$tmp_ts = $tmp_ts % $year_sec;
		$month = $this->int_divide($tmp_ts, $month_sec);
		$tmp_ts = $tmp_ts % $month_sec;
		$day = $this->int_divide($tmp_ts, $day_sec);
		$tmp_ts = $tmp_ts % $day_sec;
		
		$hour = $this->int_divide($tmp_ts, $hour_sec);
		
		return $hours . " hrs " . $months . "/" . $days . "/" . $years;
	}
	
	protected function int_divide($x, $y) {
	    if ($x == 0) return 0;
	    if ($y == 0) return FALSE;
	    return ($x - ($x % $y)) / $y;
	}	
}