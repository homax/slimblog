<?php

class Utils {

    /**
     * This function cuts the string $str.
     *
     * @param string $str
     * @param int $len
     * @return string
     */
    public static function introText($str, $len = 100) {
        if(mb_strlen($str, "UTF-8") <= $len) return $str;
        $str = mb_substr($str, 0, $len, "UTF-8");
        $pos = mb_strrpos($str, ' ', 'UTF-8');
        $str = mb_substr($str, 0, $pos, 'UTF-8');
        return $str." ...";
    }

} 