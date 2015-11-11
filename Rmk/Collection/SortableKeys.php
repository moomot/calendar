<?php
/**
 * Интерфейс сортировки ключей.
 *
 * Данный интерфейс предназначен для описания сортировки ключей коллекций.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

interface SortableKeys
{

    /**
     * Сортирует ключи коллекции с помощью функции сортировки.
     * 
     * @param  callback $sorter
     * @return SortableKeys
     */
    public function sortKeysBy($sorter);

    /**
     * Сортирует ключи коллекции по возрастанию.
     * 
     * @return SortableKeys
     */
    public function sortKeysByAscending();

    /**
     * Сортирует ключи коллекции по убыванию.
     * 
     * @return SortableKeys
     */
    public function sortKeysByDescending();
}