<?php
/**
 * Помощник для работы с числовыми значениями.
 *
 * @category Rmk
 * @package  Rmk_Util
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Util;

use UnexpectedValueException,
    OutOfRangeException;

class NumericHelper
{

    /**
     * Проверяет, является ли значение числом.
     *
     * @param  mixed $number
     * @return boolean
     */
    public static function isNumber($number)
    {
        return is_numeric($number);
    }

    /**
     * Проверяет, является ли значение положительным числом.
     *
     * @param  mixed $number
     * @return boolean
     */
    public static function isPositive($number)
    {
        return is_numeric($number) && $number > 0;
    }

    /**
     * Проверяет, является ли значение отрицательным числом.
     *
     * @param  mixed $number
     * @return boolean
     */
    public static function isNegative($number)
    {
        return is_numeric($number) && $number < 0;
    }

    /**
     * Проверяет, находится ли значение между числами.
     *
     * @param  mixed $number
     * @param  number $minNumber
     * @param  number $maxNumber
     * @return boolean
     */
    public static function isBetween($number, $minNumber, $maxNumber)
    {
        return (is_numeric($number) && $maxNumber > $minNumber)
                && ($number > $minNumber && $number < $maxNumber);
    }

    /**
     * Проверяет, находится ли значение внутри диапазона чисел.
     *
     * @param  mixed $number
     * @param  number $minNumber
     * @param  number $maxNumber
     * @return boolean
     */
    public static function isInRange($number, $minNumber, $maxNumber)
    {
        return (is_numeric($number) && $maxNumber >= $minNumber)
                && ($number >= $minNumber && $number <= $maxNumber);
    }

    /**
     * Проверяет, является ли значение нулем.
     *
     * @param  mixed $number
     * @return boolean
     */
    public static function isZero($number)
    {
        return $number == 0;
    }

    /**
     * Проверяет, является ли значение числом.
     *
     * @param  mixed &$number
     * @return &number
     * @throws UnexpectedValueException
     */
    public static function &ensureNumber(&$number)
    {
        if (!is_numeric($number)) {
            throw new UnexpectedValueException(
                    "Значение не является числом."
            );
        }

        return $number;
    }

    /**
     * Проверяет, является ли значение положительным числом.
     *
     * @param  mixed &$number
     * @return &number
     * @throws UnexpectedValueException
     */
    public static function &ensurePositive(&$number)
    {
        if (!is_numeric($number)) {
            throw new UnexpectedValueException(
                    "Значение не является числом."
            );
        }

        if ($number < 0) {
            throw new UnexpectedValueException(
                    "Значение не является положительным числом."
            );
        }

        return $number;
    }

    /**
     * Проверяет, является ли значение отрицательным числом.
     *
     * @param  mixed &$number
     * @return &number
     * @throws UnexpectedValueException
     */
    public static function &ensureNegative(&$number)
    {
        if (!is_numeric($number)) {
            throw new UnexpectedValueException(
                    "Значение не является числом."
            );
        }

        if ($number > 0) {
            throw new UnexpectedValueException(
                    "Значение не является отрицательным числом."
            );
        }

        return $number;
    }

    /**
     * Проверяет, находится ли значение между числами.
     *
     * @param  mixed &$number
     * @param  number $minNumber
     * @param  number $maxNumber
     * @return &number
     * @throws UnexpectedValueException
     * @throws OutOfRangeException
     */
    public static function &ensureBetween(&$number, $minNumber, $maxNumber)
    {
        if (!is_numeric($number)) {
            throw new UnexpectedValueException(
                    "Значение не является числом."
            );
        }

        if ($maxNumber <= $minNumber) {
            throw new UnexpectedValueException(
                    "Максимальное значение диапазона {$maxNumber} меньше или " .
                    "равно минимальному {$minNumber}."
            );
        }

        if ($number <= $minNumber) {
            throw new OutOfRangeException(
                    "Число {$number} меньше или равно минимальному " .
                    "значению диапазона {$minNumber}."
            );
        }

        if ($number >= $maxNumber) {
            throw new OutOfRangeException(
                    "Число {$number} больше или равно максимальному " .
                    "значению диапазона {$maxNumber}."
            );
        }

        return $number;
    }

    /**
     * Проверяет, находится ли значение внутри диапазона чисел.
     *
     * @param  mixed &$number
     * @param  number $minNumber
     * @param  number $maxNumber
     * @return &number
     * @throws UnexpectedValueException
     * @throws OutOfRangeException
     */
    public static function &ensureInRange(&$number, $minNumber, $maxNumber)
    {
        if (!is_numeric($number)) {
            throw new UnexpectedValueException(
                    "Значение не является числом."
            );
        }

        if ($maxNumber < $minNumber) {
            throw new UnexpectedValueException(
                    "Максимальное значение диапазона {$maxNumber} меньше " .
                    "минимального {$minNumber}."
            );
        }

        if ($number < $minNumber) {
            throw new OutOfRangeException(
                    "Число {$number} меньше минимального значения " .
                    "диапазона {$minNumber}."
            );
        }

        if ($number > $maxNumber) {
            throw new OutOfRangeException(
                    "Число {$number} больше максимального значения " .
                    "диапазона {$maxNumber}."
            );
        }

        return $number;
    }

    /**
     * Проверяет, является ли значение нулем.
     *
     * @param  mixed &$number
     * @return &number
     * @throws UnexpectedValueException
     */
    public static function &ensureZero(&$number)
    {
        if (!is_numeric($number)) {
            throw new UnexpectedValueException(
                    "Значение не является числом."
            );
        }

        if ($number != 0) {
            throw new UnexpectedValueException(
                    "Значение не является нулем."
            );
        }

        return $number;
    }

}