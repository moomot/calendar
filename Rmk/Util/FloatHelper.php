<?php
/**
 * Помощник для работы с дробными числами.
 *
 * @category Rmk
 * @package  Rmk_Util
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Util;

use UnexpectedValueException,
    OutOfRangeException;

class FloatHelper
{

    /**
     * Проверяет, является ли значение дробным числом.
     *
     * @param  mixed $float
     * @return boolean
     */
    public static function isFloat($float)
    {
        return is_float($float);
    }

    /**
     * Проверяет, является ли значение положительным дробным числом.
     *
     * @param  mixed $float
     * @return boolean
     */
    public static function isPositive($float)
    {
        return is_float($float) && $float > 0;
    }

    /**
     * Проверяет, является ли значение отрицательным дробным числом.
     *
     * @param  mixed $float
     * @return boolean
     */
    public static function isNegative($float)
    {
        return is_float($float) && $float < 0;
    }

    /**
     * Проверяет, находится ли значение между дробными числами.
     *
     * @param  mixed $float
     * @param  float $minFloat
     * @param  float $maxFloat
     * @return boolean
     */
    public static function isBetween($float, $minFloat, $maxFloat)
    {
        return (is_float($float) && $maxFloat > $minFloat)
                && ($float > $minFloat && $float < $maxFloat);
    }

    /**
     * Проверяет, находится ли значение внутри диапазона дробных чисел.
     *
     * @param  mixed $float
     * @param  float $minFloat
     * @param  float $maxFloat
     * @return boolean
     */
    public static function isInRange($float, $minFloat, $maxFloat)
    {
        return (is_float($float) && $maxFloat >= $minFloat)
                && ($float >= $minFloat && $float <= $maxFloat);
    }

    /**
     * Проверяет, является ли значение нулем.
     *
     * @param  mixed $float
     * @return boolean
     */
    public static function isZero($float)
    {
        return $float === 0.0;
    }

    /**
     * Проверяет, является ли значение дробным числом.
     *
     * @param  mixed &$float
     * @return &float
     * @throws UnexpectedValueException
     */
    public static function &ensureFloat(&$float)
    {
        if (!is_float($float)) {
            throw new UnexpectedValueException(
                    "Значение не является дробным числом."
            );
        }

        return $float;
    }

    /**
     * Проверяет, является ли значение положительным дробным числом.
     *
     * @param  mixed &$float
     * @return &float
     * @throws UnexpectedValueException
     */
    public static function &ensurePositive(&$float)
    {
        if (!is_float($float)) {
            throw new UnexpectedValueException(
                    "Значение не является дробным числом."
            );
        }

        if ($float < 0) {
            throw new UnexpectedValueException(
                    "Значение не является положительным дробным числом."
            );
        }

        return $float;
    }

    /**
     * Проверяет, является ли значение отрицательным дробным числом.
     *
     * @param  mixed &$float
     * @return &float
     * @throws UnexpectedValueException
     */
    public static function &ensureNegative(&$float)
    {
        if (!is_float($float)) {
            throw new UnexpectedValueException(
                    "Значение не является дробным числом."
            );
        }

        if ($float > 0) {
            throw new UnexpectedValueException(
                    "Значение не является отрицательным дробным числом."
            );
        }

        return $float;
    }

    /**
     * Проверяет, находится ли значение между дробными числами.
     *
     * @param  mixed &$float
     * @param  float $minFloat
     * @param  float $maxFloat
     * @return &float
     * @throws UnexpectedValueException
     * @throws OutOfRangeException
     */
    public static function &ensureBetween(&$float, $minFloat, $maxFloat)
    {
        if (!is_float($float)) {
            throw new UnexpectedValueException(
                    "Значение не является дробным числом."
            );
        }

        if ($maxFloat <= $minFloat) {
            throw new UnexpectedValueException(
                    "Максимальное значение диапазона {$maxFloat} меньше или " .
                    "равно минимальному {$minFloat}."
            );
        }

        if ($float <= $minFloat) {
            throw new OutOfRangeException(
                    "Дробное число {$float} меньше или равно минимальному " .
                    "значению диапазона {$minFloat}."
            );
        }

        if ($float >= $maxFloat) {
            throw new OutOfRangeException(
                    "Дробное число {$float} больше или равно максимальному " .
                    "значению диапазона {$maxFloat}."
            );
        }

        return $float;
    }

    /**
     * Проверяет, находится ли значение внутри диапазона дробных чисел.
     *
     * @param  mixed &$float
     * @param  float $minFloat
     * @param  float $maxFloat
     * @return &float
     * @throws UnexpectedValueException
     * @throws OutOfRangeException
     */
    public static function &ensureInRange(&$float, $minFloat, $maxFloat)
    {
        if (!is_float($float)) {
            throw new UnexpectedValueException(
                    "Значение не является дробным числом."
            );
        }

        if ($maxFloat < $minFloat) {
            throw new UnexpectedValueException(
                    "Максимальное значение диапазона {$maxFloat} меньше " .
                    "минимального {$minFloat}."
            );
        }

        if ($float < $minFloat) {
            throw new OutOfRangeException(
                    "Дробное число {$float} меньше минимального значения " .
                    "диапазона {$minFloat}."
            );
        }

        if ($float > $maxFloat) {
            throw new OutOfRangeException(
                    "Дробное число {$float} больше максимального значения " .
                    "диапазона {$maxFloat}."
            );
        }

        return $float;
    }

    /**
     * Проверяет, является ли значение нулем.
     *
     * @param  mixed &$float
     * @return &float
     * @throws UnexpectedValueException
     */
    public static function &ensureZero(&$float)
    {
        if (!is_float($float)) {
            throw new UnexpectedValueException(
                    "Значение не является дробным числом."
            );
        }

        if ($float !== 0.0) {
            throw new UnexpectedValueException(
                    "Значение не является нулем."
            );
        }

        return $float;
    }

}