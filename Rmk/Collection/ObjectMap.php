<?php
/**
 * Карта объектов общего назначения.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

use Rmk\Util\ArrayHelper,
    InvalidArgumentException;

class ObjectMap extends AbstractMap implements ObjectCollection
{

    /**
     * Тип объектов.
     *
     * @var array
     */
    protected $type;

    /**
     * Конструктор.
     *
     * @param  string $type
     * @param  array $from = null
     * @return void
     */
    public function __construct($type, array $from = null)
    {
        $this->setType($type);

        if (null !== $from) {
            $this->fromArray($from);
        }
    }

    /**
     * Возвращает тип объектов.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Устанавливает тип объектов.
     *
     * @param  string $type
     * @return ObjectCollection
     */
    public function setType($type)
    {
        ArrayHelper::ensureEmpty($this->array);

        if (!class_exists($type) && !interface_exists($type)) {
            throw new InvalidArgumentException(
                    "Класс или интерфейс {$type} не найден."
            );
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Добавляет значение в коллекцию.
     *
     * @param  mixed $value
     * @return Collection
     */
    public function add($value)
    {
        ArrayHelper::addObject($this->array, $value, $this->type);

        return $this;
    }

    /**
     * Устанавливает значение по ключу.
     *
     * @param  mixed $key
     * @param  mixed $value
     * @return Map
     */
    public function set($key, $value)
    {
        ArrayHelper::setObject($this->array, $key, $value, $this->type);

        return $this;
    }

    /**
     * Возвращает ключ значения.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function keyOf($value)
    {
        return ArrayHelper::notNullKeyOfObject($this->array, $value, $this->type);
    }

    /**
     * Возвращает последний ключ значения.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function lastKeyOf($value)
    {
        return ArrayHelper::notNullLastKeyOfObject($this->array, $value,
                                                   $this->type);
    }

    /**
     * Проверяет, содержит ли коллекция значение.
     *
     * @param  mixed $value
     * @return boolean
     */
    public function contains($value)
    {
        return ArrayHelper::containsObject($this->array, $value, $this->type);
    }

    /**
     * Удаляет значение из коллекции.
     *
     * @param  mixed $value
     * @return Collection
     */
    public function remove($value)
    {
        ArrayHelper::removeExistingObject($this->array, $value, $this->type);

        return $this;
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

        $me = $this;
        ArrayHelper::every(
                $array,
                function($value, $key) use($me) {
                    $me->set($key, $value);
                }
        );

        return $this;
    }

}