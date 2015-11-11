<?php
/**
 * Интерфейс коллекции.
 *
 * Данный интерфейс предназначен для описания базовых функций работы с
 * коллекцией.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

use Countable,
    IteratorAggregate;

interface Collection extends Countable, IteratorAggregate, Sortable, Filterable
{

    /**
     * Возвращает значение в указанной позиции.
     * 
     * @param  int $position
     * @return mixed 
     */
    public function getAt($position);

    /**
     * Возвращает первое значение.
     * 
     * @return mixed 
     */
    public function getFirst();

    /**
     * Возвращает последнее значение.
     * 
     * @return mixed 
     */
    public function getLast();

    /**
     * Добавляет значение в коллекцию.
     *
     * @param  mixed $value
     * @return Collection
     */
    public function add($value);

    /**
     * Проверяет, содержит ли коллекция значение.
     *
     * @param  mixed $value
     * @return boolean
     */
    public function contains($value);

    /**
     * Проверяет, содержит ли коллекция переданную коллекцию.
     *
     * @param  Collection $collection
     * @return boolean
     */
    public function containsCollection(Collection $collection);

    /**
     * Проверяет, одинаковые ли коллекции.
     *
     * @param  Collection $collection
     * @return boolean
     */
    public function equals(Collection $collection);

    /**
     * Проверяет, пустая ли коллекция.
     *
     * @return boolean
     */
    public function isEmpty();

    /**
     * Проверяет, не пустая ли коллекция.
     *
     * @return boolean
     */
    public function isNotEmpty();

    /**
     * Удаляет значение из коллекции.
     *
     * @param  mixed $value
     * @return Collection
     */
    public function remove($value);

    /**
     * Удаляет значение в указанной позиции.
     *
     * @param  int $position
     * @return Collection
     */
    public function removeAt($position);

    /**
     * Удаляет первое значение.
     * 
     * @return Collection 
     */
    public function removeFirst();

    /**
     * Удаляет последнее значение.
     * 
     * @return Collection 
     */
    public function removeLast();

    /**
     * Удаляет коллекцию из коллекции.
     *
     * @param  Collection $collection
     * @return Collection
     */
    public function removeCollection(Collection $collection);

    /**
     * Очищает коллекцию.
     *
     * @return Collection
     */
    public function clear();

    /**
     * Преобразовывает коллекцию в массив.
     *
     * @return array
     */
    public function toArray();

    /**
     * Заполняет коллекцию данными массива.
     *
     * @param  array $array
     * @return Collection
     */
    public function fromArray(array $array);

    /**
     * Выполняет переданную функцию для каждого элемента коллекции.
     *
     * Выполняет переданную функцию для каждого элемента коллекции. Если функция
     * возвращает false, то дальнейшая обработка прекращается.
     *
     * @param  callback $callback
     * @return boolean
     */
    public function each($callback);

    /**
     * Выполняет переданную функцию для всех элементов коллекции.
     *
     * @param  callback $callback
     * @return Collection
     */
    public function every($callback);
}