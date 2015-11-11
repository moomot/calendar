<?php
/**
 * Динамическая хешированная карта объектов общего назначения.
 *
 * @category Rmk
 * @package  Rmk_Collection
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Collection;

use Rmk\Util\CallbackHelper;

class DynamicObjectHashSet extends ObjectHashSet
{

    /**
     * Функция хеширования.
     * 
     * @var callback
     */
    private $keyFunction;

    /**
     * Конструктор.
     * 
     * @param  callback $keyFunction
     * @param  string $type
     * @param  array $from = null
     * @return void
     */
    public function __construct($keyFunction, $type, array $from = null)
    {
        $this->setKeyFunction($keyFunction);
        $this->setType($type);

        if (null !== $from) {
            $this->fromArray($from);
        }
    }

    /**
     * Возвращает функцию хеширования.
     * 
     * @return callback 
     */
    public function getKeyFunction()
    {
        return $this->keyFunction;
    }

    /**
     * Устанавливает функцию хеширования.
     * 
     * @param  callback $keyFunction
     * @return DynamicMixedHashSet 
     */
    public function setKeyFunction($keyFunction)
    {
        $this->keyFunction = CallbackHelper::ensureCallable($keyFunction);

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
        return call_user_func($this->keyFunction, $value);
    }

}