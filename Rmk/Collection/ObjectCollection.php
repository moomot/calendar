<?php
/**
 * Вспомогательный интерфейс типизированной коллекции объектов.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

interface ObjectCollection
{

    /**
     * Возвращает тип объектов.
     *
     * @return string
     */
    public function getType();

    /**
     * Устанавливает тип объектов.
     *
     * @param  string $type
     * @return ObjectCollection
     */
    public function setType($type);
}