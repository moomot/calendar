<?php
/**
 * Помощник для работы с булевыми значениями.
 *
 * @category Rmk
 * @package  Rmk_Util
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Util;

use UnexpectedValueException;

class BoolHelper
{

    /**
     * Проверяет, является ли значение булевым.
     *
     * @param  mixed $boolean
     * @return boolean
     */
    public static function isBool($boolean)
    {
        return is_bool($boolean);
    }

    /**
     * Проверяет, является ли значение булевой "правдой".
     *
     * @param  boolean $boolean
     * @return boolean
     */
    public static function isTrue($boolean)
    {
        return $boolean === true;
    }

    /**
     * Проверяет, является ли значение булевой "ложью".
     *
     * @param  boolean $boolean
     * @return boolean
     */
    public static function isFalse($boolean)
    {
        return $boolean === false;
    }

    /**
     * Проверяет, является ли значение булевым.
     *
     * @param  mixed &$boolean
     * @return &boolean
     * @throws UnexpectedValueException
     */
    public static function &ensureBool(&$boolean)
    {
        if (!is_bool($boolean)) {
            throw new UnexpectedValueException(
                    "Значение не является булевым."
            );
        }

        return $boolean;
    }

    /**
     * Проверяет, является ли значение булевой "правдой".
     *
     * @param  mixed &$boolean
     * @return &boolean
     * @throws UnexpectedValueException
     */
    public static function &ensureTrue(&$boolean)
    {
        if ($boolean !== true) {
            throw new UnexpectedValueException(
                    "Значение не является булевой \"правдой\"."
            );
        }

        return $boolean;
    }

    /**
     * Проверяет, является ли значение булевой "ложью".
     *
     * @param  mixed &$boolean
     * @return &boolean
     * @throws UnexpectedValueException
     */
    public static function &ensureFalse(&$boolean)
    {
        if ($boolean !== false) {
            throw new UnexpectedValueException(
                    "Значение не является булевой \"ложью\"."
            );
        }

        return $boolean;
    }

}