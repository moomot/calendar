<?php
/**
 * Интерфейс списка.
 *
 * Данный интерфейс предназначен для описания функциональности списка. Списком 
 * является последовательность элементов, где элементы хранятся под 
 * последовательными целочисленными положительными индексами.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

interface SequentialList extends Collection
{

    /**
     * Возвращает значение по индексу.
     * 
     * @param  int $index
     * @return mixed
     */
    public function getByIndex($index);

    /**
     * Возвращает диапазон значений списка.
     * 
     * @param  int $from
     * @param  int $to
     * @return SequentialList
     */
    public function getRange($from, $to);

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
    public function insert($index, $value);

    /**
     * Добавляет значение в начало списка.
     * 
     * Добавляет значение в начало списка. Все последующие значения будут 
     * сдвинуты на единицу.
     * 
     * @param  mixed $value
     * @return SequentialList
     */
    public function addFirst($value);

    /**
     * Добавляет значение в конец списка.
     * 
     * @param  mixed $value
     * @return SequentialList
     */
    public function addLast($value);

    /**
     * Устанавливает значение по индексу.
     * 
     * @param  int $index
     * @param  mixed $value
     * @return SequentialList
     */
    public function set($index, $value);

    /**
     * Возвращает индекс по значению.
     *
     * @param  mixed $value
     * @return int
     */
    public function indexOf($value);

    /**
     * Возвращает последний индекс по значению.
     *
     * @param  mixed $value
     * @return int
     */
    public function lastIndexOf($value);

    /**
     * Проверяет, содержит ли список индекс.
     * 
     * @param  int $index
     * @return boolean 
     */
    public function containsIndex($index);

    /**
     * Проверяет, содержит ли список диапазон.
     * 
     * @param  int $from
     * @param  int $to
     * @return boolean 
     */
    public function containsRange($from, $to);

    /**
     * Удаляет значение по индексу.
     * 
     * @param  int $index
     * @return SequentialList
     */
    public function removeByIndex($index);

    /**
     * Удаляет диапазон значений.
     * 
     * @param  int $from
     * @param  int $to
     * @return SequentialList
     */
    public function removeRange($from, $to);
}