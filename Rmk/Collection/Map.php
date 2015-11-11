<?php
/**
 * Интерфейс карты.
 *
 * Данный интерфейс предназначен для описания функциональности карты.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

interface Map extends Collection, SortableKeys
{

    /**
     * Возвращает значение по ключу.
     *
     * @param  mixed $key
     * @return mixed
     */
    public function getByKey($key);

    /**
     * Возвращает ключ в указанной позиции.
     *
     * @param  int $position
     * @return mixed
     */
    public function getKeyAt($position);

    /**
     * Возвращает первый ключ.
     * 
     * @return mixed 
     */
    public function getFirstKey();

    /**
     * Возвращает последний ключ.
     * 
     * @return mixed 
     */
    public function getLastKey();

    /**
     * Устанавливает значение по ключу.
     *
     * @param  mixed $key
     * @param  mixed $value
     * @return Map
     */
    public function set($key, $value);

    /**
     * Возвращает ключ значения.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function keyOf($value);

    /**
     * Возвращает последний ключ значения.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function lastKeyOf($value);

    /**
     * Проверяет, содержит ли карта ключ.
     *
     * @param  mixed $key
     * @return boolean
     */
    public function containsKey($key);

    /**
     * Удаляет значение по ключу.
     *
     * @param  mixed $key
     * @return Map
     */
    public function removeByKey($key);
}