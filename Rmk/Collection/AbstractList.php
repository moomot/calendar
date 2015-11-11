<?php
/**
 * Абстрактный класс списка.
 *
 * Абстрактный класс списка предназначен для реализации базовой функциональности
 * списка.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

use Rmk\Util\ArrayHelper,
    Rmk\Util\IntHelper;

abstract class AbstractList extends AbstractCollection implements SequentialList
{

    /**
     * Фильтрует коллекцию с помощью функции фильтрации.
     *
     * @param  callback $filter
     * @return Filterable
     */
    public function filterBy($filter)
    {
        ArrayHelper::filterAsListBy($this->array, $filter);

        return $this;
    }

    /**
     * Фильтрует пустые значения коллекции.
     *
     * @return Filterable
     */
    public function filter()
    {
        ArrayHelper::filterAsList($this->array);

        return $this;
    }

    /**
     * Сортирует коллекцию с помощью функции сортировки.
     *
     * @param  callback $sorter
     * @return Sortable
     */
    public function sortBy($sorter)
    {
        ArrayHelper::sortAsListBy($this->array, $sorter);

        return $this;
    }

    /**
     * Сортирует коллекцию по возрастанию.
     *
     * @return Sortable
     */
    public function sortByAscending()
    {
        ArrayHelper::sortAsListByAscending($this->array);

        return $this;
    }

    /**
     * Сортирует коллекцию по убыванию.
     *
     * @return Sortable
     */
    public function sortByDescending()
    {
        ArrayHelper::sortAsListByDescending($this->array);

        return $this;
    }

    /**
     * Возвращает значение по индексу.
     *
     * @param  int $index
     * @return mixed
     */
    public function getByIndex($index)
    {
        return ArrayHelper::getNotNullByKey($this->array, $index);
    }

    /**
     * Проверяет, содержит ли список индекс.
     *
     * @param  int $index
     * @return boolean
     */
    public function containsIndex($index)
    {
        return ArrayHelper::containsKey($this->array, $index);
    }

    /**
     * Проверяет, содержит ли список диапазон.
     *
     * @param  int $from
     * @param  int $to
     * @return boolean
     */
    public function containsRange($from, $to)
    {
        return ArrayHelper::containsRange($this->array, $from, $to);
    }

    /**
     * Удаляет значение из коллекции.
     *
     * @param  mixed $value
     * @return Collection
     */
    public function remove($value)
    {
        ArrayHelper::removeExistingValueFromList($this->array, $value);

        return $this;
    }

    /**
     * Удаляет значение в указанной позиции.
     *
     * @param  int $position
     * @return Collection
     */
    public function removeAt($position)
    {
        ArrayHelper::removeNotNullFromListAt($this->array, $position);

        return $this;
    }

    /**
     * Удаляет значение по индексу.
     *
     * @param  int $index
     * @return SequentialList
     */
    public function removeByIndex($index)
    {
        ArrayHelper::removeNotNullByKeyFromList($this->array, $index);

        return $this;
    }

    /**
     * Удаляет диапазон значений.
     *
     * @param  int $from
     * @param  int $to
     * @return SequentialList
     */
    public function removeRange($from, $to)
    {
        ArrayHelper::removeListRange($this->array, $from, $to);

        return $this;
    }

}