<?php

class PalindromicSubstring
{
    public function get(string $str)
    {
        if (empty($str)) {
            return '';
        }

        $strlen = strlen($str);
        if ($strlen === 1) {
            return $str;
        }

        $splits = str_split($str);
        // 初始化一字母和二字母的回文
        $palindromic_pairs1 = $palindromic_pairs2 = [];
        for ($i = 0; $i < $strlen; $i++) {
            if ($i+1 < $strlen && $splits[$i] === $splits[$i+1]) {
                $palindromic_pairs2[] = [$i, $i+1];
            }
            $palindromic_pairs1[] = [$i, $i];
        }
        $palindromic_pairs = array_merge($palindromic_pairs2, $palindromic_pairs1);

        $palindromic_pairs = $this->do($splits, $palindromic_pairs);

        [$i, $j] = reset($palindromic_pairs);

        $palindromic_string = '';
        for (;$i<=$j; $i++) {
            $palindromic_string .= $splits[$i];
        }

        return $palindromic_string;
    }

    public function do(array $splits, array $palindromic_pairs = [])
    {
        $upper_level_pairs = [];
        foreach ($palindromic_pairs as $v) {
            [$i, $j] = $v;
            if (isset($splits[$i-1]) && isset($splits[$j+1]) && $splits[$i-1] === $splits[$j+1]) {
                $upper_level_pairs[] = [$i-1, $j+1];
            }
        }

        if (!empty($upper_level_pairs)) {
            return $this->do($splits, $upper_level_pairs);
        }

        return $palindromic_pairs;
    }
}

    $str = 'cbbd';

    $palindromic = new PalindromicSubstring();
    $palindromic_string = $palindromic->get($str);

    var_dump($palindromic_string);