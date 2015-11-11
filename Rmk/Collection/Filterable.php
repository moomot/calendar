<?php
/**
 * Интерфейс фильтрации.
 *
 * Данный интерфейс предназначен для описания фильтрации значений коллекций.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

interface Filterable
{

    /**
     * Фильтрует коллекцию с помощью функции фильтрации.
     * 
     * @param  callback $filter
     * @return Filterable
     */
    public function filterBy($filter);

    /**
     * Фильтрует пустые значения коллекции.
     * 
     * @return Filterable
     */
    public function filter();
}