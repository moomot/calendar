<?php
/**
 * Список общего назначения.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

use Rmk\Util\ArrayHelper;

class MixedList extends AbstractList
{

    /**
     * Возвращает диапазон значений списка.
     *
     * @param  int $from
     * @param  int $to
     * @return SequentialList
     */
    public function getRange($from, $to)
    {
        $list = new self();
        $list->array = ArrayHelper::getListRange($this->array, $from, $to);

        return $list;
    }

    /**
     * Добавляет значение в начало списка.
     *
     * Добавляет значение в начало списка. Все последующие значения будут
     * сдвинуты на единицу.
     *
     * @param  mixed $value
     * @return SequentialList
     */
    public function addFirst($value)
    {
        ArrayHelper::addFirst($this->array, $value);

        return $this;
    }

    /**
     * Добавляет значение в конец списка.
     *
     * @param  mixed $value
     * @return SequentialList
     */
    public function addLast($value)
    {
        ArrayHelper::addLast($this->array, $value);

        return $this;
    }

    /**
     * Вставляет значение по указанному индексу.
     *
     * Вставляет значение по указанному индексу. Если значение вставляется не в
     * конец списка, то все последующие значения будут сдвинуты на единицу.
     *
     * @param  int $index
     * @param  mixed $value
     * @return SequentialList
     */
    public function insert($index, $value)
    {
        ArrayHelper::insertIntoList($this->array, $index, $value);

        return $this;
    }

    /**
     * Устанавливает значение по индексу.
     *
     * @param  int $index
     * @param  mixed $value
     * @return SequentialList
     */
    public function set($index, $value)
    {
        ArrayHelper::setIfNotNull($this->array, $index, $value);

        return $this;
    }

    /**
     * Возвращает индекс по значению.
     *
     * @param  mixed $value
     * @return int
     */
    public function indexOf($value)
    {
        return ArrayHelper::notNullKeyOf($this->array, $value);
    }

    /**
     * Возвращает последний индекс по значению.
     *
     * @param  mixed $value
     * @return int
     */
    public function lastIndexOf($value)
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
        $this->clear();

        if (ArrayHelper::isList($array)) {
            $this->array = $array;

            return $this;
        }

        foreach ($array as $value) {
            $this->add($value);
        }

        return $this;
    }

}