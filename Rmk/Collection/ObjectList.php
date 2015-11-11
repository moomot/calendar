<?php
/**
 * Список объектов общего назначения.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

use Rmk\Util\ArrayHelper,
    InvalidArgumentException;

class ObjectList extends AbstractList implements ObjectCollection
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
     * Возвращает диапазон значений списка.
     *
     * @param  int $from
     * @param  int $to
     * @return SequentialList
     */
    public function getRange($from, $to)
    {
        $list = new self($this->type);
        $list->array = ArrayHelper::getListRange($this->array, $from, $to);

        return $list;
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
     * Добавляет значение в начало списка.
     *
     * Добавляет значение в начало списка. Все последующие значения будут
     * сдвинуты на единицу.
     *
     * @param  mixed $value
     * @return SequentialList
     */
    public function addFirst($value)
    {
        ArrayHelper::addFirstObject($this->array, $value, $this->type);

        return $this;
    }

    /**
     * Добавляет значение в конец списка.
     *
     * @param  mixed $value
     * @return SequentialList
     */
    public function addLast($value)
    {
        ArrayHelper::addLastObject($this->array, $value, $this->type);

        return $this;
    }

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
    public function insert($index, $value)
    {
        ArrayHelper::insertObjectIntoList($this->array, $index, $value,
                                          $this->type);

        return $this;
    }

    /**
     * Устанавливает значение по индексу.
     *
     * @param  int $index
     * @param  mixed $value
     * @return SequentialList
     */
    public function set($index, $value)
    {
        ArrayHelper::setObjectIfNotNull($this->array, $index, $value,
                                        $this->type);

        return $this;
    }

    /**
     * Возвращает индекс по значению.
     *
     * @param  mixed $value
     * @return int
     */
    public function indexOf($value)
    {
        return ArrayHelper::notNullKeyOfObject($this->array, $value, $this->type);
    }

    /**
     * Возвращает последний индекс по значению.
     *
     * @param  mixed $value
     * @return int
     */
    public function lastIndexOf($value)
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
        ArrayHelper::removeExistingObjectFromList($this->array, $value,
                                                  $this->type);

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
                function($value) use($me) {
                    $me->add($value);
                }
        );

        return $this;
    }

}