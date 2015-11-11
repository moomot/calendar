<?php
/**
 * Помощник для работы с ресурсами.
 *
 * @category Rmk
 * @package  Rmk_Util
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Util;

use UnexpectedValueException;

class ResourceHelper
{

    /**
     * Проверяет, является ли значение ресурсом.
     *
     * @param  mixed $resource
     * @return boolean
     */
    public static function isResource($resource)
    {
        return is_resource($resource);
    }

    /**
     * Проверяет, является ли значение ресурсом.
     *
     * @param  mixed &$resource
     * @return &resource
     * @throws UnexpectedValueException
     */
    public static function &ensureResource(&$resource)
    {
        if (!is_resource($resource)) {
            throw new UnexpectedValueException(
                    "Значение не является ресурсом."
            );
        }

        return $resource;
    }

}