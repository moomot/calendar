<?php
/**
 * Помощник для работы с целыми числами.
 *
 * @category Rmk
 * @package  Rmk_Util
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Util;

use UnexpectedValueException,
    OutOfRangeException;

class IntHelper
{

    /**
     * Проверяет, является ли значение целым числом.
     *
     * @param  mixed $int
     * @return boolean
     */
    public static function isInt($int)
    {
        return is_int($int);
    }

    /**
     * Проверяет, является ли значение положительным целым числом.
     *
     * @param  mixed $int
     * @return boolean
     */
    public static function isPositive($int)
    {
        return is_int($int) && $int > 0;
    }

    /**
     * Проверяет, является ли значение отрицательным целым числом.
     *
     * @param  mixed $int
     * @return boolean
     */
    public static function isNegative($int)
    {
        return is_int($int) && $int < 0;
    }

    /**
     * Проверяет, находится ли значение между целыми числами.
     *
     * @param  mixed $int
     * @param  int $minInt
     * @param  int $maxInt
     * @return boolean
     */
    public static function isBetween($int, $minInt, $maxInt)
    {
        return (is_int($int) && $maxInt > $minInt)
                && ($int > $minInt && $int < $maxInt);
    }

    /**
     * Проверяет, находится ли значение внутри диапазона целых чисел.
     *
     * @param  mixed $int
     * @param  int $minInt
     * @param  int $maxInt
     * @return boolean
     */
    public static function isInRange($int, $minInt, $maxInt)
    {
        return (is_int($int) && $maxInt >= $minInt)
                && ($int >= $minInt && $int <= $maxInt);
    }

    /**
     * Проверяет, является ли значение нулем.
     *
     * @param  mixed $int
     * @return boolean
     */
    public static function isZero($int)
    {
        return $int === 0;
    }

    /**
     * Проверяет, является ли первое число больше второго.
     * 
     * @param  mixed $leftInt
     * @param  mixed $rightInt
     * @return boolean
     */
    public static function isMoreThan($leftInt, $rightInt)
    {
        return is_int($leftInt) && is_int($rightInt)
                && $leftInt > $rightInt;
    }

    /**
     * Проверяет, является ли первое число больше или равно второму.
     * 
     * @param  mixed $leftInt
     * @param  mixed $rightInt
     * @return boolean
     */
    public static function isMoreThanOrEquals($leftInt, $rightInt)
    {
        return is_int($leftInt) && is_int($rightInt)
                && $leftInt >= $rightInt;
    }

    /**
     * Проверяет, является ли первое число меньше второго.
     * 
     * @param  mixed $leftInt
     * @param  mixed $rightInt
     * @return boolean
     */
    public static function isLessThan($leftInt, $rightInt)
    {
        return is_int($leftInt) && is_int($rightInt)
                && $leftInt < $rightInt;
    }

    /**
     * Проверяет, является ли первое число меньше или равно второму.
     * 
     * @param  mixed $leftInt
     * @param  mixed $rightInt
     * @return boolean
     */
    public static function isLessThanOrEquals($leftInt, $rightInt)
    {
        return is_int($leftInt) && is_int($rightInt)
                && $leftInt <= $rightInt;
    }

    /**
     * Проверяет, является ли целое число больше нуля.
     * 
     * @param  mixed $int
     * @return boolean
     */
    public static function isMoreThanZero($int)
    {
        return is_int($int) && $int > 0;
    }

    /**
     * Проверяет, является ли целое число больше или равно нулю.
     * 
     * @param  mixed $int
     * @return boolean
     */
    public static function isMoreThanOrEqualsZero($int)
    {
        return is_int($int) && $int >= 0;
    }

    /**
     * Проверяет, является ли целое число меньше нуля.
     * 
     * @param  mixed $int
     * @return boolean
     */
    public static function isLessThanZero($int)
    {
        return is_int($int) && $int < 0;
    }

    /**
     * Проверяет, является ли целое число меньше или равно нулю.
     * 
     * @param  mixed $int
     * @return boolean
     */
    public static function isLessThanOrEqualsZero($int)
    {
        return is_int($int) && $int <= 0;
    }

    /**
     * Проверяет, является ли значение целым числом.
     *
     * @param  mixed &$int
     * @return &int
     * @throws UnexpectedValueException
     */
    public static function &ensureInt(&$int)
    {
        if (!is_int($int)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        return $int;
    }

    /**
     * Проверяет, является ли значение положительным целым числом.
     *
     * @param  mixed &$int
     * @return &int
     * @throws UnexpectedValueException
     */
    public static function &ensurePositive(&$int)
    {
        if (!is_int($int)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($int < 0) {
            throw new UnexpectedValueException(
                    "Значение не является положительным целым числом."
            );
        }

        return $int;
    }

    /**
     * Проверяет, является ли значение отрицательным целым числом.
     *
     * @param  mixed &$int
     * @return &int
     * @throws UnexpectedValueException
     */
    public static function &ensureNegative(&$int)
    {
        if (!is_int($int)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($int > 0) {
            throw new UnexpectedValueException(
                    "Значение не является отрицательным целым числом."
            );
        }

        return $int;
    }

    /**
     * Проверяет, находится ли значение между целыми числами.
     *
     * @param  mixed &$int
     * @param  int $minInt
     * @param  int $maxInt
     * @return &int
     * @throws UnexpectedValueException
     * @throws OutOfRangeException
     */
    public static function &ensureBetween(&$int, $minInt, $maxInt)
    {
        if (!is_int($int)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($maxInt <= $minInt) {
            throw new UnexpectedValueException(
                    "Максимальное значение диапазона {$maxInt} меньше или " .
                    "равно минимальному {$minInt}."
            );
        }

        if ($int <= $minInt) {
            throw new OutOfRangeException(
                    "Целое число {$int} меньше или равно минимальному " .
                    "значению диапазона {$minInt}."
            );
        }

        if ($int >= $maxInt) {
            throw new OutOfRangeException(
                    "Целое число {$int} больше или равно максимальному " .
                    "значению диапазона {$maxInt}."
            );
        }

        return $int;
    }

    /**
     * Проверяет, находится ли значение внутри диапазона целых чисел.
     *
     * @param  mixed &$int
     * @param  int $minInt
     * @param  int $maxInt
     * @return &type
     * @throws UnexpectedValueException
     * @throws OutOfRangeException
     */
    public static function &ensureInRange(&$int, $minInt, $maxInt)
    {
        if (!is_int($int)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($maxInt < $minInt) {
            throw new UnexpectedValueException(
                    "Максимальное значение диапазона {$maxInt} меньше " .
                    "минимального {$minInt}."
            );
        }

        if ($int < $minInt) {
            throw new OutOfRangeException(
                    "Целое число {$int} меньше минимального значения " .
                    "диапазона {$minInt}."
            );
        }

        if ($int > $maxInt) {
            throw new OutOfRangeException(
                    "Целое число {$int} больше максимального значения " .
                    "диапазона {$maxInt}."
            );
        }

        return $int;
    }

    /**
     * Проверяет, является ли значение нулем.
     *
     * @param  mixed &$int
     * @return &int
     * @throws UnexpectedValueException
     */
    public static function &ensureZero(&$int)
    {
        if (!is_int($int)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($int !== 0) {
            throw new UnexpectedValueException(
                    "Значение не является нулем."
            );
        }

        return $int;
    }

    /**
     * Проверяет, является ли первое число больше второго.
     * 
     * @param  mixed &$leftOperand
     * @param  int $rightOperand
     * @return &int
     * @throws UnexpectedValueException
     */
    public static function &ensureMoreThan(&$leftOperand, $rightOperand)
    {
        if (!is_int($leftOperand)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($leftOperand <= $rightOperand) {
            throw new UnexpectedValueException(
                    "Целое число {$leftOperand} меньше или " .
                    "равно {$rightOperand}."
            );
        }

        return $leftOperand;
    }

    /**
     * Проверяет, является ли первое число больше или равно второму.
     * 
     * @param  mixed &$leftOperand
     * @param  int $rightOperand
     * @return &int
     * @throws UnexpectedValueException 
     */
    public static function &ensureMoreThanOrEquals(&$leftOperand, $rightOperand)
    {
        if (!is_int($leftOperand)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($leftOperand < $rightOperand) {
            throw new UnexpectedValueException(
                    "Целое число {$leftOperand} меньше {$rightOperand}."
            );
        }

        return $leftOperand;
    }

    /**
     * Проверяет, является ли первое число меньше второго.
     * 
     * @param  mixed &$leftOperand
     * @param  int $rightOperand
     * @return &int
     * @throws UnexpectedValueException 
     */
    public static function &ensureLessThan(&$leftOperand, $rightOperand)
    {
        if (!is_int($leftOperand)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($leftOperand >= $rightOperand) {
            throw new UnexpectedValueException(
                    "Целое число {$leftOperand} больше или " .
                    "равно {$rightOperand}."
            );
        }

        return $leftOperand;
    }

    /**
     * Проверяет, является ли целое число меньше или равно нулю.
     * 
     * @param  mixed &$leftOperand
     * @param  int $rightOperand
     * @return &int
     * @throws UnexpectedValueException 
     */
    public static function &ensureLessThanOrEquals(&$leftOperand, $rightOperand)
    {
        if (!is_int($leftOperand)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($leftOperand > $rightOperand) {
            throw new UnexpectedValueException(
                    "Целое число {$leftOperand} больше {$rightOperand}."
            );
        }

        return $leftOperand;
    }

    /**
     * Проверяет, является ли целое число больше нуля.
     * 
     * @param  mixed &$int
     * @return &int
     * @throws UnexpectedValueException 
     */
    public static function &ensureMoreThanZero(&$int)
    {
        if (!is_int($int)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($int <= 0) {
            throw new UnexpectedValueException(
                    "Целое число {$int} меньше или равно нулю."
            );
        }

        return $int;
    }

    /**
     * Проверяет, является ли целое число больше или равно нулю.
     * 
     * @param  mixed &$int
     * @return &int
     * @throws UnexpectedValueException 
     */
    public static function &ensureMoreThanOrEqualsZero(&$int)
    {
        if (!is_int($int)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($int < 0) {
            throw new UnexpectedValueException(
                    "Целое число {$int} меньше нуля."
            );
        }

        return $int;
    }

    /**
     * Проверяет, является ли целое число меньше нуля.
     * 
     * @param  mixed &$int
     * @return &int
     * @throws UnexpectedValueException 
     */
    public static function &ensureLessThanZero(&$int)
    {
        if (!is_int($int)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($int >= 0) {
            throw new UnexpectedValueException(
                    "Целое число {$int} больше или равно нулю."
            );
        }

        return $int;
    }

    /**
     * Проверяет, является ли целое число меньше или равно нулю.
     * 
     * @param  mixed &$int
     * @return &int
     * @throws UnexpectedValueException 
     */
    public static function &ensureLessThanOrEqualsZero(&$int)
    {
        if (!is_int($int)) {
            throw new UnexpectedValueException(
                    "Значение не является целым числом."
            );
        }

        if ($int > 0) {
            throw new UnexpectedValueException(
                    "Целое число {$int} больше нуля."
            );
        }
        
        return $int;
    }

}