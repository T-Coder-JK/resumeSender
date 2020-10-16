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





/**
 * @param array $arr
 * @param string $key
 * @return \Carbon\Carbon $latestDate
 * */
function findLatestDate($arr, $key){
    $latestDate = \Carbon\Carbon::minValue();
    for($i=0; $i<sizeof($arr); $i++){
        if ($arr[$i][$key] > $latestDate){
            $latestDate = $arr[$i][$key];
        }
    }
    return $latestDate;
}
