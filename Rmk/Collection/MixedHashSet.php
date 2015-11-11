<?php
/**
 * Хешированная карта общего назначения.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

use Rmk\Util\ArrayHelper;

class MixedHashSet extends AbstractHashSet
{

    /**
     * Выполняет хеширование значения и возвращает его ключ.
     * 
     * @param  mixed $value 
     * @return mixed
     */
    public function getKey($value)
    {
        if (is_object($value)) {
            if (is_callable(array(&$value, '__toString'))) {
                return $value->__toString();
            } else {
                return spl_object_hash($value);
            }
        }

        return (string) $value;
    }

}