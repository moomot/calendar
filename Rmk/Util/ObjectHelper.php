<?php
/**
 * Помощник для работы с объектами.
 *
 * @category Rmk
 * @package  Rmk_Util
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Util;

use UnexpectedValueException;

class ObjectHelper
{

    /**
     * Проверяет, является ли значение объектом.
     *
     * @param  mixed $object
     * @return boolean
     */
    public static function isObject($object)
    {
        return is_object($object);
    }

    /**
     * Проверяет, является ли значение объектом определенного типа.
     *
     * @param  mixed $object
     * @param  string $type
     * @return boolean
     */
    public static function isInstanceOf($object, $type)
    {
        return $object instanceof $type;
    }

    /**
     * Проверяет, является ли значение объектом.
     *
     * @param  mixed &$object
     * @return &object
     * @throws UnexpectedValueException
     */
    public static function &ensureObject(&$object)
    {
        if (!is_object($object)) {
            throw new UnexpectedValueException(
                    "Значение не является объектом."
            );
        }

        return $object;
    }

    /**
     * Проверяет, является ли значение объектом определенного типа.
     *
     * @param  mixed &$object
     * @param  string $type
     * @return &object
     * @throws UnexpectedValueException
     */
    public static function &ensureInstanceOf(&$object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Значение не является объектом типа {$type}."
            );
        }

        return $object;
    }

}