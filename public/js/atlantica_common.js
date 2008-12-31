function getTimestampFromGameTime(year, month, day, hour)
{
	var time0 = 1170457299;
	var year_sec = 1036800;
	var month_sec = 86400;
	var day_sec = 2880;
	var hour_sec = 120;
	
	return time0 + year * year_sec + month * month_sec + day * day_sec + hour * hour_sec;
}

function getGameTimeFromTimestamp(ts)
{
	var time0 = 1170457299;
	var atlantica_ts = ts - time0;
	var day_hour= 24;
	var month_day = 30;
	var year_month = 12;
	var hour_sec = 120;
	
	var tmp_ts = atlantica_ts;
	var hours = int_divide(tmp_ts, hour_sec);
	
	var days = int_divide(hours, day_hour);
	hours = hours - days * day_hour;
	
	var months = int_divide(days, month_day);
	days = days - months * month_day;
	if(days == 0)
	{
		days = 30;
		months = months - 1;
	}
	
	var years = int_divide(months, year_month);
	months = months - years * year_month;
	if(months == 0) 
	{
		months = 12;
		years = years - 1;
	}
	
	return hours + " hrs " + months + "/" . days + "/" + years;
}