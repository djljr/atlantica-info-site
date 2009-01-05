<?php

class CalendarController extends Zend_Controller_Action
{
	protected $_calendarEventDao;
		
	public function indexAction()
	{
		$date = time();
		$day = date('d', $date);
		$month = date('m', $date);
		$year = date('Y', $date);
		$first_day = mktime(0,0,0,$month, 1, $year);
		
		$this->view->blanks = date('N', $first_day) % 7;
		$this->view->year = $year;
		$this->view->month = $month;
		$this->view->title = date('F', $first_day);
		$this->view->daysInMonth = cal_days_in_month(0, $month, $year);
		
		$calendarEventDao = $this->_getCalendarEventDao();
		$this->view->events = $calendarEventDao->fetchMonthEvents($month, $year);
	}
	
	public function eventAction()
	{
		$month = $this->_getParam("month");
		$day = $this->_getParam("day");
		$year = $this->_getParam("year");
		
		$date = mktime(0,0,0,$month, $day, $year);
		$this->view->date = getdate($date);
		$this->view->aoDate = $this->getGameTimeFromTimestamp($date);
	}
	
	public function addeventAction()
	{
		$month = $this->_getParam("month");
		$day = $this->_getParam("day");
		$year = $this->_getParam("year");
		
		$dateStart = mktime(0,0,0,$month, $day, $year);
		$dateEnd = mktime(23, 59, 59, $month, $day, $year);
		$this->view->date = getdate($dateStart);
		$this->view->aoDateStart = $this->getGameTimeFromTimestamp($dateStart);
		$this->view->aoDateEnd = $this->getGameTimeFromTimestamp($dateEnd);
				
		if ($this->getRequest()->isPost()) 
		{
			$event = array();
			$type = $this->_getParam("timeType");
			if('atlantica' == $type)
			{
				$postMonth = $this->_getParam("atlanticaMonth");
				$postDay = $this->_getParam("atlanticaDay");
				$postYear = $this->_getParam("atlanticaYear");
				
				$event['timestamp'] = $this->getTimestampFromGameTime($postYear, $postMonth, $postDay, 0);
			}
			else if('earth' == $type)
			{
				$postMonth = $this->_getParam("earthMonth");
				$postDay = $this->_getParam("earthDay");
				$postYear = $this->_getParam("earthYear");
				$postHour = $this->_getParam("earthHour");
				$postMinute = $this->_getParam("earthMinute");
				$ampm = $this->_getParam("earthAmPm");
				if($ampm == 'pm')
				{
					$postHour = 12 + ($postHour % 12);
				}
				
				$event['timestamp'] = mktime($postHour, $postMinute, 0, $postMonth, $postDay, $postYear);
			}
			
			if($event['timestamp'])
			{
				$event['title'] = $this->_getParam("title");
				$event['category'] = $this->_getParam("category");
				$event['symbol'] = $this->_getParam("symbol");
				$event['description'] = $this->_getParam("description");
				
				$calendarEventDao = $this->_getCalendarEventDao();
				$calendarEventDao->save($event);
			}
		}
	}
	
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

	protected function _getCalendarEventDao()
	{
		if (null === $this->_calendarEventDao)
		{
			require_once APPLICATION_PATH . '/models/CalendarEventDao.php';
			$this->_calendarEventDao = new Model_CalendarEvent;
		}
		return $this->_calendarEventDao;
	}
}