<?php
/**
 * Lấy thời gia hiện tại
 * @param type $boolean
 * @return type
 */
function datetimeNow($boolean=true){
    if($boolean){
        return date("Y-m-d H:i:s");
    }else{
        return date("Y-m-d");
    }
    
}
/**
 *Hàm trả về kết quả thời gian sau số ngày nhập vào
 * VD :
 *  - 19 December 2010, Sunday
 *  date_after (3)
 *  => 22 December 2010, Sunday
 * @param <type> $numday
 */
function datetimeAfter($numday){
    $hours = $a * 24;
    $added = ($hours * 3600)+time();
    $days = date("l", $added);
    $month = date("F", $added);
    $day = date("j", $added);
    $year = date("Y", $added);
    $result = "$day $month $year - $days";
    return ($result);
}

/**
 *
 * @param Datetime $date
 * @param Int $days
 * @param Datetime $format
 * @return Datetime 
 */
function datetimeNextDays($date,$days,$format='Y-m-d'){
    return (isset($date)) ? date($format,  strtotime('+'.$days.' day',strtotime($date)))  : FALSE;
}

/**
 *
 * @param Datetime $date
 * @param Int $days
 * @param Datetime $format
 * @return Datetime 
 */
function datetimePreviousDays($date,$days,$format='Y-m-d'){
    return (isset($date)) ? date($format,  strtotime('-'.$days.' day',strtotime($date)))  : FALSE;
}

/**
 *
 * @param Datetime $date
 * @param Int $months
 * @param Datetime $format
 * @return Datetime 
 */
function datetimeNextMonths($date,$months,$format='Y-m-d'){
    return (isset($date)) ? date($format,  strtotime('+'.$months.' month',strtotime($date)))  : FALSE;
}

/**
 *
 * @param Datetime $date
 * @param Int $months
 * @param Datetime $format
 * @return Datetime 
 */
function datetimePreviousMonths($date,$months,$format='Y-m-d'){
    return (isset($date)) ? date($format,  strtotime('-'.$months.' month',strtotime($date)))  : FALSE;
}

/**
 * Days Intil
 * @param Datetime $date
 * @return <Int> : number of days 
 * @example days_until('30-04-2012') 
 */
function daysUntil($date){
    return (isset($date)) ? floor((strtotime($date) - time())/60/60/24) : FALSE;
}

/**
 *
 * @param <Date Time> $date1
 * @param <Date Time> $date2
 * @return <Int> 
 * @example days_between('30-04-2012','30-05-2012')
 */
function daysBetween($date1,$date2){
    $str_date1 = strtotime($date1);
    $str_date2 = strtotime($date2);
    $time      = $str_date1 - $str_date2;
    $time < 0 ? $time = $time*-1 : "";
    return floor($time/60/60/24);
}


/**
 * Caculate moth between two datetimes
 * @param Datetime $datetime1
 * @param Datime $datetime2
 * @return int 
 */
function monthsBetween($datetime1,$datetime2){
    $d1 = strtotime($datetime1);
    $d2 = strtotime($datetime2);
    $min_date = min($d1, $d2);
    $max_date = max($d1, $d2);
    $i = 0;

    while (($min_date = strtotime("+1 month", $min_date)) <= $max_date) {
        $i++;
    }
    return $i; // 8
}
/**
 *
 * @param Decimal Integer $number
 * @param Int $precision
 * @param Character $separator
 * @return Decimal Int  
 */
function floorDec($number,$precision,$separator)
{
    $numberpart     =   explode($separator,$number);
    if(isset($numberpart[1])){
        $numberpart[1]  =   substr_replace($numberpart[1],$separator,$precision,0);
        if($numberpart[0]>=0)
        {
            $numberpart[1] =   floor($numberpart[1]);

        }
        else
        {
            $numberpart[1] =   ceil($numberpart[1]);

        }

        $ceil_number   =   array($numberpart[0],$numberpart[1]);

        return implode($separator,$ceil_number);
    }else{
        return $numberpart[0];
    }
}

