<?php
/**
 * Created by PhpStorm.
 * User: PH
 * Date: 15/10/20
 * Time: 10:08 PM
 * @param $array
 * @param $key
 * @return \Carbon\Carbon
 */

use Carbon\Carbon;


/**
 * @param array $arrs
 * @param string $key
 * @param string $dateFormat
 * @return Carbon $latestDate
 * */
function findLatestDate($arrs, $key, $dateFormat){
    $latestDate = Carbon::minValue();
    foreach($arrs as $arr){
        if ($arr[$key] > $latestDate){
            $latestDate = $arr[$key];
        }

    }
    if (gettype($latestDate) === 'object'){
        return $latestDate->format($dateFormat);
    }else{
        return Carbon::create($latestDate)->format($dateFormat);
    }
}
