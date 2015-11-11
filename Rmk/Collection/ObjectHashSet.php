<?php
/**
 * Хешированная карта объектов общего назначения.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

use Rmk\Util\ArrayHelper,
    Rmk\Util\ObjectHelper,
    InvalidArgumentException,
    UnexpectedValueException;

class ObjectHashSet extends AbstractHashSet implements ObjectCollection
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
     * Выполняет хеширование значения и возвращает его ключ.
     * 
     * @param  mixed $value 
     * @return mixed
     */
    public function getKey($value)
    {
        return spl_object_hash($value);
    }

    /**
     * Добавляет значение в коллекцию.
     *
     * @param  mixed $value
     * @return Collection
     */
    public function add($value)
    {
        ArrayHelper::setObject($this->array, $this->getKey($value), $value,
                                                           $this->type);

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
        $hashKey = $this->getKey($value);

        if ($key !== $hashKey) {
            throw new UnexpectedValueException(
                    "Ключ хешированной карты {$hashKey} не совпадает с " .
                    "указанным ключем {$key}."
            );
        }

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
        ObjectHelper::ensureInstanceOf($value, $this->type);

        $key = $this->getKey($value);

        return ArrayHelper::ensureKeyInArray($this->array, $key);
    }

    /**
     * Проверяет, содержит ли коллекция значение.
     *
     * @param  mixed $value
     * @return boolean
     */
    public function contains($value)
    {
        ObjectHelper::ensureInstanceOf($value, $this->type);

        return ArrayHelper::containsKey($this->array, $this->getKey($value));
    }

    /**
     * Удаляет значение из коллекции.
     *
     * @param  mixed $value
     * @return Collection
     */
    public function remove($value)
    {
        ObjectHelper::ensureInstanceOf($value, $this->type);
        ArrayHelper::removeNotNullByKey($this->array, $this->getKey($value));

        return $this;
    }

}