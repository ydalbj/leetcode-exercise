<?php
class Solution
{
    function lengthOfLongestSubstring($s)
    {
        $chars = str_split($s);
        $string_length = count($chars);
        $char_position_distances = [];
        $last_position = null;
        $last_char = null;
        foreach ($chars as $k => $v) {
            $char_position_distances[$v][$k] = $string_length - $k;
            if (isset($last_position)) {
                $char_position_distances[$last_char][$last_position] = $k - $last_position;
            }

            $last_char = $v;
            $last_position = $k;
        }

        $max_length = 1;
        foreach ($chars as $k => $v) {
            $_length = $char_position_distances[$v][$k];
            if ($_length <= $max_length) {
                continue;
            }
            foreach ($max_length)
        }
    }
}