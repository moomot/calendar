<?php
/**
 * Интерфейс сортировки.
 *
 * Данный интерфейс предназначен для описания сортировки значений коллекций.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

interface Sortable
{

    /**
     * Сортирует коллекцию с помощью функции сортировки.
     * 
     * @param  callback $sorter
     * @return Sortable
     */
    public function sortBy($sorter);

    /**
     * Сортирует коллекцию по возрастанию.
     * 
     * @return Sortable
     */
    public function sortByAscending();

    /**
     * Сортирует коллекцию по убыванию.
     * 
     * @return Sortable
     */
    public function sortByDescending();
}