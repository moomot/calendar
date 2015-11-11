<?php
/**
 * Абстрактный класс хешированной карты.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

use Rmk\Util\ArrayHelper,
    UnexpectedValueException;

abstract class AbstractHashSet extends AbstractMap implements Map, Set
{

    /**
     * Выполняет хеширование значения и возвращает его ключ.
     * 
     * @param  mixed $value 
     * @return mixed
     */
    abstract public function getKey($value);

    /**
     * Добавляет значение в коллекцию.
     *
     * @param  mixed $value
     * @return Collection
     */
    public function add($value)
    {
        ArrayHelper::set($this->array, $this->getKey($value), $value);

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

        ArrayHelper::set($this->array, $key, $value);

        return $this;
    }

    /**
     * Проверяет, содержит ли коллекция значение.
     *
     * @param  mixed $value
     * @return boolean
     */
    public function contains($value)
    {
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
        ArrayHelper::removeNotNullByKey($this->array, $this->getKey($value));

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
        $key = $this->getKey($value);

        return ArrayHelper::ensureKeyInArray($this->array, $key);
    }

    /**
     * Возвращает последний ключ значения.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function lastKeyOf($value)
    {
        return $this->keyOf($value);
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

        foreach ($array as $value) {
            $this->add($value);
        }

        return $this;
    }

}