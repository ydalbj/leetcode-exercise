<?php
class Solution
{
    static function lengthOfLongestSubstring($s)
    {
        if (empty($s)) {
            return 0;
        }

        if (strlen($s) === 1) {
            return 1;
        }

        // 以字符为键，以字符所在位置为值模拟集合用法(reference中采用strpos,substr方法效率更高)
        $set = [];
        $len = strlen($s);
        $j = 0;
        $max = 1;
        while ($j < $len) {
            $char = $s[$j];
            // 如果 $j 所在字符已在set中，从该字符之后剪切新set
            if (isset($set[$char])) {
                reset($set);
                $start = current($set);
                $offset = $set[$char] - $start;
                $set = array_slice($set, $offset + 1);
                continue;
            }
            $set[$char] = $j + 1;
            $max = max($max, count($set));
            $j++;
        }

        return $max;
    }
}

$s = 'aabcdcefbg';
$r = Solution::lengthOfLongestSubstring($s);
var_dump($r);