<?php
/**
 * Помощник для работы со строками.
 *
 * @category Rmk
 * @package  Rmk_Util
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Util;

use UnexpectedValueException;

class StringHelper
{

    /**
     * Проверяет, является ли значение строкой.
     *
     * @param  mixed $string
     * @return boolean
     */
    public static function isString($string)
    {
        return is_string($string);
    }

    /**
     * Проверяет, является ли значение строкой.
     *
     * @param  mixed &$string
     * @return &string
     * @throws UnexpectedValueException
     */
    public static function &ensureString(&$string)
    {
        if (!is_string($string)) {
            throw new UnexpectedValueException(
                    "Значение не является строкой."
            );
        }

        return $string;
    }

}