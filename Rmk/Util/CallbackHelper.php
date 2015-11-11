<?php
/**
 * Помощник для работы с функциями обратного вызова.
 *
 * @category Rmk
 * @package  Rmk_Util
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Util;

use Closure,
    UnexpectedValueException;

class CallbackHelper
{

    /**
     * Тип вызова - замыкание.
     *
     * @constant int
     */

    const CALLBACK_CLOSURE = 1;

    /**
     * Тип вызова - функция.
     *
     * @constant int
     */
    const CALLBACK_FUNCTION = 2;

    /**
     * Тип вызова - статический метод.
     *
     * @constant int
     */
    const CALLBACK_STATIC_METHOD = 3;

    /**
     * Тип вызова - метод объекта.
     *
     * @constant int
     */
    const CALLBACK_OBJECT_METHOD = 4;

    /**
     * Проверяет, является ли значение функцией обратного вызова.
     *
     * @param  mixed $callback
     * @return boolean
     */
    public static function isCallable($callback)
    {
        return is_callable($callback);
    }

    /**
     * Возвращает тип функции обратного вызова.
     *
     * @param  mixed $callback
     * @return int
     * @throws UnexpectedValueException
     */
    public static function getType($callback)
    {
        if (!is_callable($callback)) {
            throw new UnexpectedValueException(
                    "Значение не является функцией обратного вызова."
            );
        }

        if ($callback instanceof Closure) {
            return self::CALLBACK_CLOSURE;
        } elseif (is_array($callback)
                && is_object($callback[0])
                && is_string($callback[1])) {
            return self::CALLBACK_OBJECT_METHOD;
        } elseif (is_array($callback)
                && is_string($callback[0])
                && is_string($callback[1])) {
            return self::CALLBACK_STATIC_METHOD;
        } else {
            return self::CALLBACK_FUNCTION;
        }
    }

    /**
     * Проверяет, является ли значение функцией обратного вызова.
     *
     * @param  callback &$callback
     * @return &callback
     * @throws UnexpectedValueException
     */
    public static function &ensureCallable(&$callback)
    {
        if (!is_callable($callback)) {
            throw new UnexpectedValueException(
                    "Значение не является функцией обратного вызова."
            );
        }

        return $callback;
    }

    /**
     * Проверяет, соответствует ли значение определенному типу функции
     * обратного вызова.
     *
     * @param  mixed &$callback
     * @param  int $type
     * @return &callback
     * @throws UnexpectedValueException
     */
    public static function &ensureType(&$callback, $type)
    {
        if ($type !== self::getType($callback)) {
            throw new UnexpectedValueException(
                    "Значение не является указанным типом функции " .
                    "обратного вызова."
            );
        }

        return $callback;
    }

}