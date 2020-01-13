<?php
class Solution {
    /**
    * @param String $s
    * @return Integer
    */
    function lengthOfLongestSubstring($s) {
        $i = $j = $k = 0;
        $max = $cnt = 0;
        for($i=0; $i<strlen($s); $i++){
            for($j=$k; $j<$i; $j++){
                if($s[$i] == $s[$j]){
                    if($cnt>$max)$max=$cnt;
                    $cnt = $i-$j;
                    $k = $j+1;
                    break;
                }
            }
        if($j == $i)$cnt++;
        if($cnt > $max)$max=$cnt;
        }
        return $max;
    }
}