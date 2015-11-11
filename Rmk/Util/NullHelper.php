<?php
/**
 * Помощник для работы с пустыми значениями.
 *
 * @category Rmk
 * @package  Rmk_Util
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Util;

use UnexpectedValueException;

class NullHelper
{

    /**
     * Проверяет, является ли значение пустым.
     *
     * @param  mixed $null
     * @return boolean
     */
    public static function isNull($null)
    {
        return $null === null;
    }

    /**
     * Проверяет, является ли значение не пустым.
     *
     * @param  mixed $null
     * @return boolean
     */
    public static function isNotNull($null)
    {
        return $null !== null;
    }

    /**
     * Проверяет, является ли значение пустым.
     *
     * @param  mixed &$null
     * @return &null
     * @throws UnexpectedValueException
     */
    public static function &ensureNull(&$null)
    {
        if ($null !== null) {
            throw new UnexpectedValueException(
                    "Значение не является пустым."
            );
        }

        return $null;
    }

    /**
     * Проверяет, является ли значение не пустым.
     *
     * @param  mixed &$null
     * @return &null
     * @throws UnexpectedValueException
     */
    public static function &ensureNotNull(&$null)
    {
        if ($null === null) {
            throw new UnexpectedValueException(
                    "Значение не является не пустым."
            );
        }

        return $null;
    }

}