<?php
class Solution
{
    public function reverse($x)
    {
        $reverse = 0;
        $max = 2**31;
        $line = intdiv($max, 10);
        var_dump($line);
        while ($x != 0) {
            $pop = $x % 10;
            var_dump($reverse);
            if ($reverse > $line || ($reverse == $line && $pop > 7)) {
                return 0;
            }

            if ($reverse < -$line || ($reverse == -$line && $pop < -8)) {
                return 0;
            }

            $reverse = $reverse*10 + $pop;

            $x = intdiv($x, 10);
        }

        return $reverse;
    }
}

$x = 1534236469;

$o = new Solution();
$y = $o->reverse($x);
var_dump($y);