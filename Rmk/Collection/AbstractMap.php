<?php
/**
 * Абстрактный класс карты.
 *
 * Абстрактный класс карты предназначен для реализации базовой функциональности 
 * карты.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

use Rmk\Util\ArrayHelper;

abstract class AbstractMap extends AbstractCollection implements Map
{

    /**
     * Фильтрует коллекцию с помощью функции фильтрации.
     * 
     * @param  callback $filter
     * @return Filterable
     */
    public function filterBy($filter)
    {
        ArrayHelper::filterBy($this->array, $filter);

        return $this;
    }

    /**
     * Фильтрует пустые значения коллекции.
     * 
     * @return Filterable
     */
    public function filter()
    {
        ArrayHelper::filter($this->array);

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
        ArrayHelper::sortAsHashBy($this->array, $sorter);

        return $this;
    }

    /**
     * Сортирует коллекцию по возрастанию.
     * 
     * @return Sortable
     */
    public function sortByAscending()
    {
        ArrayHelper::sortAsHashByAscending($this->array);

        return $this;
    }

    /**
     * Сортирует коллекцию по убыванию.
     * 
     * @return Sortable
     */
    public function sortByDescending()
    {
        ArrayHelper::sortAsHashByDescending($this->array);

        return $this;
    }

    /**
     * Сортирует ключи коллекции с помощью функции сортировки.
     * 
     * @param  callback $sorter
     * @return SortableKeys
     */
    public function sortKeysBy($sorter)
    {
        ArrayHelper::sortAsHashKeysBy($this->array, $sorter);

        return $this;
    }

    /**
     * Сортирует ключи коллекции по возрастанию.
     * 
     * @return SortableKeys
     */
    public function sortKeysByAscending()
    {
        ArrayHelper::sortAsHashKeysByAscending($this->array);

        return $this;
    }

    /**
     * Сортирует ключи коллекции по убыванию.
     * 
     * @return SortableKeys
     */
    public function sortKeysByDescending()
    {
        ArrayHelper::sortAsHashKeysByDescending($this->array);

        return $this;
    }

    /**
     * Возвращает значение по ключу.
     *
     * @param  mixed $key
     * @return mixed
     */
    public function getByKey($key)
    {
        return ArrayHelper::getNotNullByKey($this->array, $key);
    }

    /**
     * Возвращает ключ в указанной позиции.
     *
     * @param  int $position
     * @return mixed
     */
    public function getKeyAt($position)
    {
        return ArrayHelper::getNotNullKeyAt($this->array, $position);
    }

    /**
     * Возвращает первый ключ.
     * 
     * @return mixed 
     */
    public function getFirstKey()
    {
        return ArrayHelper::getNotNullFirstKey($this->array);
    }

    /**
     * Возвращает последний ключ.
     * 
     * @return mixed 
     */
    public function getLastKey()
    {
        return ArrayHelper::getNotNullLastKey($this->array);
    }

    /**
     * Проверяет, содержит ли карта ключ.
     *
     * @param  mixed $key
     * @return boolean
     */
    public function containsKey($key)
    {
        return ArrayHelper::containsKey($this->array, $key);
    }

    /**
     * Удаляет значение по ключу.
     *
     * @param  mixed $key
     * @return Map
     */
    public function removeByKey($key)
    {
        ArrayHelper::removeNotNullByKey($this->array, $key);

        return $this;
    }

}