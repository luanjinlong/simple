<?php

/**
 * 公共函数
 */

if (!function_exists('getNumRand')) {
    /**
     * 获取几位随机数字
     * @param $num
     * @return bool|string
     */
    function getNumRand($num)
    {
        // MD5 最大是32位，应该够了，不够重复1，反正是随机的
        $str = substr(md5(time()), 0, $num);
        if ($num > 32) {
            return $str . str_repeat(1, $num - 32);
        }
        return $str;
    }
}

if (!function_exists('getFieldInArr')) {
    /**
     * 再某个数组中，获取 $filed 值为键的数组
     * @param $org_arr  array 原数组
     * @param $field_arr  array|bool 要获取的键
     * @return array
     */
    function getFieldInArr($org_arr, $field_arr = false)
    {
        if ($field_arr === false) {
            return $org_arr;
        }
        $tmp_arr = [];
        foreach ($org_arr as $key => $item) {
            if (in_array($key, $field_arr)) {
                $tmp_arr[$key] = $item;
            }
        }
        return $tmp_arr;
    }
}
