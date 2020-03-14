<?php

class ZigZag
{
    public function convert(string $s, int $numRows)
    {
        if ($numRows <= 1) {
            return $s;
        }
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
                $row_steps[$i][1] = 2*$numRows - 2 - (2*$i);
                $row_steps[$i][0] = 2*$numRows - 2 - (2*($last_row-$i));
            }
            $row_columns[$i] = 0;
        }

        $newstr = '';
        $data = [];
        for ($i = 0; $i < $strlen; $i++) {
            $current_column = $row_columns[$current_row];

            $step = $this->getStep($current_row, $current_column, $first_row, $last_row, $row_steps);
            $base_index = $this->getBaseIndex($current_row, $current_column, $data);
            while (($index = $base_index + $step) >= $strlen) {
                $current_row++;
                if ($current_row >= $numRows) {
                    break 2; // 如果当前行超过或等于总行数，跳出2重循环
                }
                $current_column = $row_columns[$current_row];
                $base_index = $this->getBaseIndex($current_row, $current_column, $data);
                $step = $this->getStep($current_row, $current_column, $first_row, $last_row, $row_steps);
            }
            
            $data[$current_row][$current_column] = $index;
            $newstr .= $s[$index];
            $row_columns[$current_row] = $current_column+1;
        }

        return $newstr;
    }

    public function getBaseIndex($current_row, $current_column, $data)
    {
        $base_index = $current_row;
        $current_column && $base_index = $data[$current_row][$current_column-1];

        return $base_index;
    }

    public function getStep($current_row, $current_column, $first_row, $last_row, $row_steps)
    {
        if ($first_row === $current_row || $last_row === $current_row) {
            $step = $row_steps[$current_row];
        } else {
            $_i = $current_column % 2;
            $step = $row_steps[$current_row][$_i];
        }
        if ($current_column === 0) {
            $step = 0;
        }

        return $step;
    }
}

$zigzag = new ZigZag();
$str = 'PAYPALISHIRING';
$zigzag_str = $zigzag->convert($str, 4);
var_dump($zigzag_str);