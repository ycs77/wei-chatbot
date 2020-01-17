<?php

/**
 * Get the env value.
 *
 * @param  string  $varName
 * @return string|array|false
 */
function env($varName) {
    return getenv($varName);
}

/**
 * 判斷是不是繁體字.
 *
 * @param  [type]  $input
 * @return boolean
 */
function is_traditional($input)
{
    return mb_strlen($input, 'UTF-8') !== mb_strlen(iconv('UTF-8', 'GB2312//IGNORE', $input), 'GB2312');
}

/**
 * 判斷是不是簡體字.
 *
 * @param  [type]  $input
 * @return boolean
 */
function is_simplified($input)
{
    return mb_strlen($input, 'UTF-8') !== mb_strlen(iconv('UTF-8', 'CP950//IGNORE', $input), 'CP950');
}

/**
 * 繁體轉簡體.
 *
 * @param  string  $input
 * @return string|false
 */
function zh_t_to_s($input) {
    if (!is_traditional($input)) {
        return $input;
    }

    if (!$str = @iconv('UTF-8', 'BIG5//IGNORE', $input)) {
        return $input;
    }

    $str = iconv('BIG5', 'GB2312//IGNORE', $str);
    return iconv('GB2312', 'UTF-8//IGNORE', $str);
}

/**
 * 簡體轉繁體.
 *
 * @param  string  $input
 * @return string|false
 */
function zh_s_to_t($input) {
    if (!is_simplified($input)) {
        return $input;
    }

    if (!$str = iconv('UTF-8', 'GB2312//IGNORE', $input)) {
        return $input;
    }

    $str = iconv('GB2312', 'BIG5//IGNORE', $str);
    return iconv('BIG5', 'UTF-8//IGNORE', $str);
}
