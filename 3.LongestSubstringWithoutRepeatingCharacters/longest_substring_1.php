<?php
class Solution
{
    function lengthOfLongestSubstring($s)
    {
        if (($len = strlen($s)) <= 1) {
            return $len;
        }

        $chars = str_split($s);
        $string_length = count($chars);
        $char_position_distances = [];

        foreach ($chars as $k => $v) {
            // 重置该字符最后位置长度
            if (isset($char_position_distances[$v])) {
                end($char_position_distances[$v]);
                $last_position = key($char_position_distances[$v]);
                $char_position_distances[$v][$last_position] = $k - $last_position;
            }

            $char_position_distances[$v][$k] = $string_length - $k;
        }

    
        $max_length = 1;
        for ($i = 0; $i < $string_length; $i++) {
            $_length = $this->longestSubstringFromPosition($chars, $char_position_distances, $i);
            if ($_length > $max_length) {
                $max_length = $_length;
            }
        }

        return $max_length;
    }

    protected function longestSubstringFromPosition(
        array $chars,
        array $char_position_distances,
        int $start_position
    ) {
        $end_position = count($chars) - 1;
        $max_length = $end_position - $start_position + 1;
        for ($i = $start_position; $i <= $end_position; $i++) {
            $v = $chars[$i];
            
            $_end = $i + $char_position_distances[$v][$i] -1;
            if ($_end < $end_position) {
                $end_position = $_end;
            }
            $max_length = $end_position - $start_position + 1;
        }

        return $max_length;
    }
}

// $a = [
//     'a' => [1,2,3]
// ];
// var_dump(key($a['a']));
// end($a['a']);
// var_dump(key($a['a']));
// exit;
$o = new Solution();
$s = "au";
$len = $o->lengthOfLongestSubstring($s);
var_dump($len);