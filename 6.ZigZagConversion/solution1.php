<?php

class ZigZag
{
    public function convert(string $s, int $numRows)
    {
        $strlen = strlen($s);
        $first_row = 0;
        $last_row = $numRows - 1;
        $row_steps = [];
        $current_row = 0;
        $row_columns = [];
        for ($i = 0; $i < $numRows; $i++) {
            if ($i === $first_row || $i === $last_row) {
                $row_steps[$i] = 2*$numRows - 2;
            } else {
                $row_steps[$i] = $numRows-1;
            }
            $row_columns[$i] = 0;
        }

        $newstr = '';
        for ($i = 0; $i < $strlen; $i++) {
            $step = $row_steps[$current_row];
            $current_column = $row_columns[$current_row];
            while (($index = $current_row + ($current_column * $step)) >= $strlen) {
                $current_row++;
                if ($current_row >= $numRows) {
                    break 2; // 如果当前行超过或等于总行数，跳出2重循环
                }
                $current_column = $row_columns[$current_row];
            }
            
            $newstr .= $s[$index];
            $row_columns[$current_row] = $current_column+1;
        }

        return $newstr;
    }
}

$zigzag = new ZigZag();
$str = 'abcdefg';
$zigzag_str = $zigzag->convert($str, 3);
var_dump($zigzag_str);