<?php
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $len = count($nums);
        for ($i  = 0; $i< $len; $i++) {
            $find = array_search($target-$nums[$i], $nums);
            if ($find !==false && $find !== $i) {
                return [$i, $find];
            }
        }
    }
}