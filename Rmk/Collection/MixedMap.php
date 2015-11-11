<?php
/**
 * Карта общего назначения.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

use Rmk\Util\ArrayHelper;

class MixedMap extends AbstractMap
{

    /**
     * Устанавливает значение по ключу.
     *
     * @param  mixed $key
     * @param  mixed $value
     * @return Map
     */
    public function set($key, $value)
    {
        ArrayHelper::set($this->array, $key, $value);

        return $this;
    }

    /**
     * Возвращает ключ значения.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function keyOf($value)
    {
        return ArrayHelper::notNullKeyOf($this->array, $value);
    }

    /**
     * Возвращает последний ключ значения.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function lastKeyOf($value)
    {
        return ArrayHelper::notNullLastKeyOf($this->array, $value);
    }

    /**
     * Заполняет коллекцию данными массива.
     *
     * @param  array $array
     * @return Collection
     */
    public function fromArray(array $array)
    {
        $this->array = $array;

        return $this;
    }

}