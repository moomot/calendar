<?php
/**
 * Помощник для работы с массивами.
 *
 * @category Rmk
 * @package  Rmk_Util
 * @author   Roman rmk Mogilatov rmogilatov@gmail.com
 */

namespace Rmk\Util;

use UnexpectedValueException,
    InvalidArgumentException;

class ArrayHelper
{

    /**
     * Проверяет, является ли значение массивом.
     *
     * @param  mixed $array
     * @return boolean
     */
    public static function isArray($array)
    {
        return is_array($array);
    }

    /**
     * Проверяет, является ли массив списком.
     *
     * @param  array $array
     * @return boolean
     */
    public static function isList(array $array)
    {
        return array_keys($array) === range(0, count($array) - 1);
    }

    /**
     * Проверяет, является ли массив хешем.
     *
     * @param  array $array
     * @return boolean
     */
    public static function isHash(array $array)
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }

    /**
     * Проверяет, является ли массив пустым.
     *
     * @param  array $array
     * @return boolean
     */
    public static function isEmpty(array $array)
    {
        return empty($array);
    }

    /**
     * Проверяет, является ли массив не пустым.
     *
     * @param  array $array
     * @return boolean
     */
    public static function isNotEmpty(array $array)
    {
        return !empty($array);
    }

    /**
     * Проверяет, является ли значение массивом.
     *
     * @param  mixed &$array
     * @return &array
     * @throws UnexpectedValueException
     */
    public static function &ensureArray(&$array)
    {
        if (!is_array($array)) {
            throw new UnexpectedValueException(
                    "Значение не является массивом."
            );
        }

        return $array;
    }

    /**
     * Проверяет, является ли значение списком.
     *
     * @param  mixed &$array
     * @return &array
     * @throws UnexpectedValueException
     */
    public static function &ensureList(&$array)
    {
        if (!is_array($array)) {
            throw new UnexpectedValueException(
                    "Значение не является массивом."
            );
        }

        if (array_keys($array) !== range(0, count($array) - 1)) {
            throw new UnexpectedValueException(
                    "Значение не является списком."
            );
        }

        return $array;
    }

    /**
     * Проверяет, является ли значение хешем.
     *
     * @param  mixed &$array
     * @return &array
     * @throws UnexpectedValueException
     */
    public static function &ensureHash(&$array)
    {
        if (!is_array($array)) {
            throw new UnexpectedValueException(
                    "Значение не является массивом."
            );
        }

        if (array_keys($array) === range(0, count($array) - 1)) {
            throw new UnexpectedValueException(
                    "Значение не является хешем."
            );
        }

        return $array;
    }

    /**
     * Проверяет, является ли значение пустым массивом.
     *
     * @param  mixed &$array
     * @return &array
     * @throws UnexpectedValueException
     */
    public static function &ensureEmpty(&$array)
    {
        if (!is_array($array)) {
            throw new UnexpectedValueException(
                    "Значение не является массивом."
            );
        }

        if (!empty($array)) {
            throw new UnexpectedValueException(
                    "Значение не является пустым массивом."
            );
        }

        return $array;
    }

    /**
     * Проверяет, является ли значение не пустым массивом.
     *
     * @param  mixed &$array
     * @return &array
     * @throws UnexpectedValueException
     */
    public static function &ensureNotEmpty(&$array)
    {
        if (!is_array($array)) {
            throw new UnexpectedValueException(
                    "Значение не является массивом."
            );
        }

        if (empty($array)) {
            throw new UnexpectedValueException(
                    "Значение не является не пустым массивом."
            );
        }

        return $array;
    }

    /**
     * Проверяет, содержит ли массив ключ.
     * 
     * @param  mixed &$array
     * @param  mixed $key
     * @return &array
     * @throws UnexpectedValueException 
     */
    public static function &ensureContainsKey(&$array, $key)
    {
        if (!is_array($array)) {
            throw new UnexpectedValueException(
                    "Значение не является массивом."
            );
        }

        if (!isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Массив не содержит ключ {$key}."
            );
        }

        return $array;
    }

    /**
     * Проверяет, содержит ли массив ключ.
     *
     * @param  array $array
     * @param  mixed &$key
     * @return &mixed
     * @throws UnexpectedValueException 
     */
    public static function &ensureKeyInArray($array, &$key)
    {
        if (!is_array($array)) {
            throw new UnexpectedValueException(
                    "Значение не является массивом."
            );
        }

        if (!isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Массив не содержит ключ {$key}."
            );
        }

        return $key;
    }

    /**
     * Проверяет, содержит ли массив диапазон значений.
     *
     * @param  array &$array
     * @param  int $from
     * @param  int $to
     * @return &array
     * @throws UnexpectedValueException
     */
    public static function &ensureContainsRange(array &$array, $from, $to)
    {
        if (!is_int($from)) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} не является " .
                    "целым числом."
            );
        }

        if (!is_int($to)) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} не является " .
                    "целым числом."
            );
        }

        if ($from < 0) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} находится ниже нуля."
            );
        }

        if ($to <= $from) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} меньше или равен " .
                    "нижнему параметру диапазона {$from}."
            );
        }

        if ($to > count($array) - 1) {
            $lastIndex = count($array) - 1;
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} больше " .
                    "последнего максимального индекса массива {$lastIndex}."
            );
        }

        return $array;
    }

    /**
     * Проверяет, содержит ли список диапазон значений.
     *
     * @param  array &$array
     * @param  int $from
     * @param  int $to
     * @return &array
     * @throws UnexpectedValueException
     */
    public static function &ensureContainsListRange(array &$array, $from, $to)
    {
        self::ensureList($array);

        if (!is_int($from)) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} не является " .
                    "целым числом."
            );
        }

        if (!is_int($to)) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} не является " .
                    "целым числом."
            );
        }

        if ($from < 0) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} находится ниже нуля."
            );
        }

        if ($to <= $from) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} меньше или равен " .
                    "нижнему параметру диапазона {$from}."
            );
        }

        if ($to > count($array) - 1) {
            $lastIndex = count($array) - 1;
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} больше " .
                    "последнего максимального индекса списка {$lastIndex}."
            );
        }

        return $array;
    }

    /**
     * Возвращает значение по ключу.
     *
     * @param  array $array
     * @param  mixed $key
     * @return mixed
     */
    public static function getByKey(array $array, $key)
    {
        if (!isset($array[$key])) {
            return null;
        }

        return $array[$key];
    }

    /**
     * Возвращает значение по ключу, если значение по ключу установлено.
     *
     * @param  array $array
     * @param  mixed $key
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function getNotNullByKey(array $array, $key)
    {
        if (!isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Значение по ключу {$key} не установлено."
            );
        }

        return $array[$key];
    }

    /**
     * Возвращает значение по ключу или значение по умолчанию, если значение по
     * ключу не установлено.
     *
     * @param  array $array
     * @param  mixed $key
     * @param  mixed $default = null
     * @return mixed
     */
    public static function getByKeyOrDefault(array $array, $key, $default = null)
    {
        if (!isset($array[$key])) {
            return $default;
        }

        return $array[$key];
    }

    /**
     * Возвращает ссылку на значение по ключу.
     *
     * @param  array &$array
     * @param  mixed $key
     * @return &mixed
     */
    public static function &getReferenceByKey(array &$array, $key)
    {
        return $array[$key];
    }

    /**
     * Возвращает ссылку на значение по ключу, если значение по ключу
     * установлено.
     *
     * @param  array &$array
     * @param  mixed $key
     * @return &mixed
     * @throws UnexpectedValueException
     */
    public static function &getNotNullReferenceByKey(array &$array, $key)
    {
        if (!isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Значение по ключу {$key} не установлено."
            );
        }

        return $array[$key];
    }

    /**
     * Возвращает ссылку на значение по ключу или значение по умолчанию, если
     * значение по ключу не установлено.
     *
     * @param  array &$array
     * @param  mixed $key
     * @param  mixed &$default = null
     * @return &mixed
     */
    public static function &getReferenceByKeyOrDefault(array &$array, $key,
                                                       &$default = null)
    {
        if (!isset($array[$key])) {
            return $default;
        }

        return $array[$key];
    }

    /**
     * Возвращает значение массива, находящееся в указанной позиции.
     *
     * @param  array &$array
     * @param  int $position
     * @return mixed
     */
    public static function getAt(array &$array, $position)
    {
        if ($position < 0 || $position > (count($array) - 1)) {
            return null;
        }

        reset($array);

        $value = current($array);

        for ($i = 0; $i < $position; $i++) {
            $value = next($array);
        }

        return $value;
    }

    /**
     * Возвращает значение массива, находящееся в указанной позиции.
     *
     * @param  array &$array
     * @param  int $position
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function getNotNullAt(array &$array, $position)
    {
        if ($position < 0 || $position > (count($array) - 1)) {
            throw new UnexpectedValueException(
                    "Позиция {$position} находится за пределами массива."
            );
        }

        reset($array);

        $value = current($array);

        for ($i = 0; $i < $position; $i++) {
            $value = next($array);
        }

        return $value;
    }

    /**
     * Возвращает ключ массива, находящийся в указанной позиции.
     *
     * @param  array &$array
     * @param  int $position
     * @return mixed
     */
    public static function getKeyAt(array &$array, $position)
    {
        if ($position < 0 || $position > (count($array) - 1)) {
            return null;
        }

        reset($array);

        for ($i = 0; $i < $position; $i++) {
            next($array);
        }

        return key($array);
    }

    /**
     * Возвращает ключ массива, находящийся в указанной позиции.
     *
     * @param  array &$array
     * @param  int $position
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function getNotNullKeyAt(array &$array, $position)
    {
        if ($position < 0 || $position > (count($array) - 1)) {
            throw new UnexpectedValueException(
                    "Позиция {$position} находится за пределами массива."
            );
        }

        reset($array);

        for ($i = 0; $i < $position; $i++) {
            next($array);
        }

        return key($array);
    }

    /**
     * Возвращает случайный элемент массива.
     *
     * @param  array $array
     * @return mixed
     */
    public static function getRandom(array $array)
    {
        if (empty($array)) {
            return null;
        }

        return $array[array_rand($array)];
    }

    /**
     * Возвращает случайный ключ массива.
     *
     * @param  array $array
     * @return mixed
     */
    public static function getRandomKey(array $array)
    {
        return array_rand($array);
    }

    /**
     * Возвращает первый элемент массива.
     *
     * @param  array &$array
     * @return mixed
     */
    public static function getFirst(array &$array)
    {
        $value = reset($array);

        if (false === $value) {
            return null;
        }

        return $value;
    }

    /**
     * Возвращает первый элемент массива.
     *
     * @param  array &$array
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function getNotNullFirst(array &$array)
    {
        if (empty($array)) {
            throw new UnexpectedValueException(
                    "Первое значение не доступно так как массив пуст."
            );
        }

        return reset($array);
    }

    /**
     * Возвращает последний элемент массива.
     *
     * @param  array &$array
     * @return mixed
     */
    public static function getLast(array &$array)
    {
        $value = end($array);

        if (false === $value) {
            return null;
        }

        return $value;
    }

    /**
     * Возвращает последний элемент массива.
     *
     * @param  array &$array
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function getNotNullLast(array &$array)
    {
        if (empty($array)) {
            throw new UnexpectedValueException(
                    "Последнее значение не доступно так как массив пуст."
            );
        }

        $value = end($array);

        return $value;
    }

    /**
     * Возвращает первый ключ массива.
     *
     * @param  array &$array
     * @return mixed
     */
    public static function getFirstKey(array &$array)
    {
        reset($array);

        return key($array);
    }

    /**
     * Возвращает первый ключ массива.
     *
     * @param  array &$array
     * @return mixed
     */
    public static function getNotNullFirstKey(array &$array)
    {
        if (empty($array)) {
            throw new UnexpectedValueException(
                    "Первый ключ не доступен так как массив пуст."
            );
        }

        reset($array);

        return key($array);
    }

    /**
     * Возвращает последний ключ массива.
     *
     * @param  array &$array
     * @return mixed
     */
    public static function getLastKey(array &$array)
    {
        end($array);

        return key($array);
    }

    /**
     * Возвращает последний ключ массива.
     *
     * @param  array &$array
     * @return mixed
     */
    public static function getNotNullLastKey(array &$array)
    {
        if (empty($array)) {
            throw new UnexpectedValueException(
                    "Последний ключ не доступен так как массив пуст."
            );
        }

        end($array);

        return key($array);
    }

    /**
     * Возвращает диапазон элементов массива в виде ассоциативного массива.
     *
     * @param  array &$array
     * @param  int $from
     * @param  int $to
     * @return array
     * @throws UnexpectedValueException
     */
    public static function getRange(array &$array, $from, $to)
    {
        if (!is_int($from)) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} не является " .
                    "целым числом."
            );
        }

        if (!is_int($to)) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} не является " .
                    "целым числом."
            );
        }

        if ($from < 0) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} находится ниже нуля."
            );
        }

        if ($to <= $from) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} меньше или равен " .
                    "нижнему параметру диапазона {$from}."
            );
        }

        return array_slice($array, $from, $to - $from + 1, true);
    }

    /**
     * Возвращает диапазон элементов массива в виде списка.
     *
     * @param  array &$array
     * @param  int $from
     * @param  int $to
     * @return array
     * @throws UnexpectedValueException
     */
    public static function getListRange(array &$array, $from, $to)
    {
        if (!is_int($from)) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} не является " .
                    "целым числом."
            );
        }

        if (!is_int($to)) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} не является " .
                    "целым числом."
            );
        }

        if ($from < 0) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} находится ниже нуля."
            );
        }

        if ($to <= $from) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} меньше или равен " .
                    "нижнему параметру диапазона {$from}."
            );
        }

        return array_values(array_slice($array, $from, $to - $from + 1, false));
    }

    /**
     * Возвращает все ключи.
     *
     * @param  array $array
     * @return array
     */
    public static function getKeys(array $array)
    {
        return array_keys($array);
    }

    /**
     * Возвращает все ключи, которые соответствуют значению.
     *
     * @param  array $array
     * @param  mixed $value
     * @return array
     */
    public static function getKeysOf(array $array, $value)
    {
        return array_keys($array, $value, true);
    }

    /**
     * Возвращает все значения.
     *
     * @param  array $array
     * @return array
     */
    public static function getValues(array $array)
    {
        return array_values($array);
    }

    /**
     * Устанавливает значение по ключу.
     *
     * @param  array &$array
     * @param  mixed $key
     * @param  mixed $value
     * @return void
     */
    public static function set(array &$array, $key, $value)
    {
        $array[$key] = $value;
    }

    /**
     * Устанавливает значение по ключу, если значение по ключу не было
     * установлено.
     *
     * @param  array &$array
     * @param  mixed $key
     * @param  mixed $value
     * @return void
     * @throws UnexpectedValueException
     */
    public static function setIfNull(array &$array, $key, $value)
    {
        if (isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Значение по ключу {$key} уже установлено."
            );
        }

        $array[$key] = $value;
    }

    /**
     * Устанавливает значение по ключу, если значение по ключу было
     * установлено.
     *
     * @param  array &$array
     * @param  mixed $key
     * @param  mixed $value
     * @return void
     * @throws UnexpectedValueException
     */
    public static function setIfNotNull(array &$array, $key, $value)
    {
        if (!isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Значение по ключу {$key} не установлено."
            );
        }

        $array[$key] = $value;
    }

    /**
     * Устанавливает объект определенного типа по ключу.
     *
     * @param  array &$array
     * @param  mixed $key
     * @param  object $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function setObject(array &$array, $key, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $array[$key] = $object;
    }

    /**
     * Устанавливает объект определенного типа по ключу, если значение по ключу
     * не было установлено.
     *
     * @param  array &$array
     * @param  mixed $key
     * @param  object $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function setObjectIfNull(array &$array, $key, $object, $type)
    {
        if (isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Значение по ключу {$key} уже установлено."
            );
        }

        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $array[$key] = $object;
    }

    /**
     * Устанавливает объект определенного типа по ключу, если значение по ключу
     * было установлено.
     *
     * @param  array &$array
     * @param  mixed $key
     * @param  object $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function setObjectIfNotNull(array &$array, $key, $object,
                                              $type)
    {
        if (!isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Значение по ключу {$key} не установлено."
            );
        }

        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $array[$key] = $object;
    }

    /**
     * Устанавливает ссылку на значение по ключу.
     *
     * @param  array &$array
     * @param  mixed $key
     * @param  mixed &$value
     * @return void
     */
    public static function setReference(array &$array, $key, &$value)
    {
        $array[$key] = &$value;
    }

    /**
     * Устанавливает ссылку на значение по ключу, если значение по ключу не было
     * установлено.
     *
     * @param  array &$array
     * @param  mixed $key
     * @param  mixed &$value
     * @return void
     * @throws UnexpectedValueException
     */
    public static function setReferenceIfNull(array &$array, $key, &$value)
    {
        if (isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Значение по ключу {$key} уже установлено."
            );
        }

        $array[$key] = &$value;
    }

    /**
     * Устанавливает ссылку на значение по ключу, если значение по ключу было
     * установлено.
     *
     * @param  array &$array
     * @param  mixed $key
     * @param  mixed &$value
     * @return void
     * @throws UnexpectedValueException
     */
    public static function setReferenceIfNotNull(array &$array, $key, &$value)
    {
        if (!isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Значение по ключу {$key} не установлено."
            );
        }

        $array[$key] = &$value;
    }

    /**
     * Добавляет значение.
     *
     * @param  array &$array
     * @param  mixed $value
     * @return void
     */
    public static function add(array &$array, $value)
    {
        $array[] = $value;
    }

    /**
     * Добавляет объект определенного типа.
     *
     * @param  array &$array
     * @param  object $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function addObject(array &$array, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $array[] = $object;
    }

    /**
     * Добавляет значение в начало массива.
     *
     * @param  array &$array
     * @param  mixed $value
     * @return void
     */
    public static function addFirst(array &$array, $value)
    {
        array_unshift($array, $value);
    }

    /**
     * Добавляет объект определенного типа в начало массива.
     *
     * @param  array &$array
     * @param  object $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function addFirstObject(array &$array, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        array_unshift($array, $object);
    }

    /**
     * Добавляет значение в конец массива.
     *
     * @param  array &$array
     * @param  mixed $value
     * @return void
     */
    public static function addLast(array &$array, $value)
    {
        $array[] = $value;
    }

    /**
     * Добавляет объект определенного типа в конец массива.
     *
     * @param  array &$array
     * @param  object $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function addLastObject(array &$array, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $array[] = $object;
    }

    /**
     * Вставляет значение в указанную позицию списка.
     *
     * @param  array &$array
     * @param  int $index
     * @param  mixed $value
     * @return void
     * @throws UnexpectedValueException
     */
    public static function insertIntoList(array &$array, $index, $value)
    {
        if (!is_int($index)) {
            throw new UnexpectedValueException(
                    "Индекс списка {$index} не является целым числом."
            );
        }

        if ($index < 0) {
            throw new UnexpectedValueException(
                    "Индекс списка {$index} меньше нуля."
            );
        }

        $count = count($array);

        if ($index > $count) {
            throw new UnexpectedValueException(
                    "Индекс списка {$index} больше длинны списка {$count}."
            );
        }

        if (0 === $index) {
            array_unshift($array, $value);
        } elseif ($count === $index) {
            array_push($array, $value);
        } else {
            $offset = array_slice($array, $index);
            array_unshift($offset, $value);
            array_splice($array, $index, $count, $offset);
        }
    }

    /**
     * Вставляет объект в указанную позицию списка.
     *
     * @param  array &$array
     * @param  int $index
     * @param  mixed $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function insertObjectIntoList(array &$array, $index, $object,
                                                $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        if (!is_int($index)) {
            throw new UnexpectedValueException(
                    "Индекс списка {$index} не является целым числом."
            );
        }

        if ($index < 0) {
            throw new UnexpectedValueException(
                    "Индекс списка {$index} меньше нуля."
            );
        }

        $count = count($array);

        if ($index > $count) {
            throw new UnexpectedValueException(
                    "Индекс списка {$index} больше длинны списка {$count}."
            );
        }

        if (0 === $index) {
            array_unshift($array, $object);
        } elseif ($count === $index) {
            array_push($array, $object);
        } else {
            $offset = array_slice($array, $index);
            array_unshift($offset, $object);
            array_splice($array, $index, $count, $offset);
        }
    }

    /**
     * Возвращает ключ значения.
     *
     * @param  array $array
     * @param  mixed $value
     * @return mixed
     */
    public static function keyOf(array $array, $value)
    {
        $key = array_search($value, $array, true);

        if (false === $key) {
            return null;
        }

        return $key;
    }

    /**
     * Возвращает ключ значения.
     *
     * @param  array $array
     * @param  mixed $value
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function notNullKeyOf(array $array, $value)
    {
        $key = array_search($value, $array, true);

        if (false === $key) {
            throw new UnexpectedValueException(
                    'Ключ значения не найден.'
            );
        }

        return $key;
    }

    /**
     * Возвращает ключ объекта.
     *
     * @param  array $array
     * @param  object $object
     * @param  string $type
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function keyOfObject(array $array, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $key = array_search($object, $array, true);

        if (false === $key) {
            return null;
        }

        return $key;
    }

    /**
     * Возвращает ключ объекта.
     *
     * @param  array $array
     * @param  object $object
     * @param  string $type
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function notNullKeyOfObject(array $array, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $key = array_search($object, $array, true);

        if (false === $key) {
            throw new UnexpectedValueException(
                    'Ключ объекта не найден.'
            );
        }

        return $key;
    }

    /**
     * Возвращает последний ключ значения.
     *
     * @param  array $array
     * @param  mixed $value
     * @return mixed
     */
    public static function lastKeyOf(array $array, $value)
    {
        $keys = array_keys($array, $value, true);

        return array_pop($keys);
    }

    /**
     * Возвращает последний ключ значения.
     *
     * @param  array $array
     * @param  mixed $value
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function notNullLastKeyOf(array $array, $value)
    {
        $keys = array_keys($array, $value, true);

        if (empty($keys)) {
            throw new UnexpectedValueException(
                    'Ключ значения не найден.'
            );
        }

        return array_pop($keys);
    }

    /**
     * Возвращает последний ключ объекта.
     *
     * @param  array $array
     * @param  object $object
     * @param  string $type
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function lastKeyOfObject(array $array, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $keys = array_keys($array, $object, true);

        return array_pop($keys);
    }

    /**
     * Возвращает последний ключ объекта.
     *
     * @param  array $array
     * @param  object $object
     * @param  string $type
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function notNullLastKeyOfObject(array $array, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $keys = array_keys($array, $object, true);

        if (empty($keys)) {
            throw new UnexpectedValueException(
                    'Ключ объекта не найден.'
            );
        }

        return array_pop($keys);
    }

    /**
     * Проверяет, содержит ли массив значение.
     *
     * @param  array $array
     * @param  mixed $value
     * @return boolean
     */
    public static function containsValue(array $array, $value)
    {
        return in_array($value, $array, true);
    }

    /**
     * Проверяет, содержит ли массив объект.
     *
     * @param  array $array
     * @param  object $object
     * @param  string $type
     * @return boolean
     * @throws UnexpectedValueException
     */
    public static function containsObject(array $array, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        return in_array($object, $array, true);
    }

    /**
     * Проверяет, содержит ли массив ключ.
     *
     * @param  array $array
     * @param  mixed $key
     * @return boolean
     */
    public static function containsKey(array $array, $key)
    {
        return isset($array[$key]);
    }

    /**
     * Проверяет, содержатся ли ключи и значения второго массива в первом.
     *
     * @param  array $array
     * @param  array $candidateArray
     * @return boolean
     */
    public static function contains(array $array, array $candidateArray)
    {
        if (count($candidateArray) > count($array)) {
            return false;
        }

        foreach ($candidateArray as $key => $value) {
            if (!isset($array[$key])) {
                return false;
            }

            if ($array[$key] !== $value) {
                return false;
            }
        }

        return true;
    }

    /**
     * Проверяет, содержатся ли значения второго массива в первом.
     *
     * @param  array $array
     * @param  array $candidateArray
     * @return boolean
     */
    public static function containsValues(array $array, array $candidateArray)
    {
        if (count($candidateArray) > count($array)) {
            return false;
        }

        foreach ($candidateArray as $value) {
            if (!in_array($value, $array)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Проверяет, содержатся ли ключи второго массива в первом.
     *
     * @param  array $array
     * @param  array $candidateArray
     * @return boolean
     */
    public static function containsKeys(array $array, array $candidateArray)
    {
        if (count($candidateArray) > count($array)) {
            return false;
        }

        foreach ($candidateArray as $key => $value) {
            if (!isset($array[$key])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Проверяет, являются ли значения второго массива ключами первого.
     *
     * @param  array $array
     * @param  array $candidateArray
     * @return boolean
     */
    public static function containsKeysList(array $array, array $candidateArray)
    {
        if (count($candidateArray) > count($array)) {
            return false;
        }

        foreach ($candidateArray as $key) {
            if (!isset($array[$key])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Проверяет, содержит ли массив диапазон значений.
     *
     * @param  array $array
     * @param  int $from
     * @param  int $to
     * @return boolean
     * @throws UnexpectedValueException
     */
    public static function containsRange(array $array, $from, $to)
    {
        if (!is_int($from)) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} не является " .
                    "целым числом."
            );
        }

        if (!is_int($to)) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} не является " .
                    "целым числом."
            );
        }

        if ($from < 0) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} находится ниже нуля."
            );
        }

        if ($to <= $from) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} меньше или равен " .
                    "нижнему параметру диапазона {$from}."
            );
        }

        return $to <= count($array) - 1;
    }

    /**
     * Проверяет, содержит ли список диапазон значений.
     *
     * @param  array $array
     * @param  int $from
     * @param  int $to
     * @return boolean
     * @throws UnexpectedValueException
     */
    public static function containsListRange(array $array, $from, $to)
    {
        if (!is_int($from)) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} не является " .
                    "целым числом."
            );
        }

        if (!is_int($to)) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} не является " .
                    "целым числом."
            );
        }

        if ($from < 0) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} находится ниже нуля."
            );
        }

        if ($to <= $from) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} меньше или равен " .
                    "нижнему параметру диапазона {$from}."
            );
        }

        return ($to <= count($array) - 1) && self::isList($array);
    }

    /**
     * Проверяет, равен ли второй массив первому.
     *
     * @param  array $array
     * @param  array $candidateArray
     * @return boolean
     */
    public static function equals(array $array, array $candidateArray)
    {
        return $array === $candidateArray;
    }

    /**
     * Проверяет, равны ли значения второго массива первому.
     *
     * @param  array $array
     * @param  array $candidateArray
     * @return boolean
     */
    public static function equalsValues(array $array, array $candidateArray)
    {
        return array_values($array) === array_values($candidateArray);
    }

    /**
     * Проверяет, равны ли ключи второго массива первому.
     *
     * @param  array $array
     * @param  array $candidateArray
     * @return boolean
     */
    public static function equalsKeys(array $array, array $candidateArray)
    {
        return array_keys($array) === array_keys($candidateArray);
    }

    /**
     * Проверяет, равны ли ключи первого массива значениям второго.
     *
     * @param  array $array
     * @param  array $candidateArray
     * @return boolean
     */
    public static function equalsKeysList(array $array, array $candidateArray)
    {
        return array_keys($array) === $candidateArray;
    }

    /**
     * Удаляет значение по ключу.
     *
     * @param  array &$array
     * @param  mixed $key
     * @return void
     */
    public static function removeByKey(array &$array, $key)
    {
        unset($array[$key]);
    }

    /**
     * Удаляет значение по ключу, если значение по ключу установлено.
     *
     * @param  array &$array
     * @param  mixed $key
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeNotNullByKey(array &$array, $key)
    {
        if (!isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Значение по ключу {$key} не установлено."
            );
        }

        unset($array[$key]);
    }

    /**
     * Удаляет значение по ключу и переиндексирует список, если значение по
     * ключу установлено.
     *
     * @param  array &$array
     * @param  mixed $key
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeNotNullByKeyFromList(array &$array, $key)
    {
        if (!isset($array[$key])) {
            throw new UnexpectedValueException(
                    "Значение по ключу {$key} не установлено."
            );
        }

        unset($array[$key]);

        $array = array_values($array);
    }

    /**
     * Удаляет значение массива, находящееся в указанной позиции.
     *
     * @param  array &$array
     * @param  int $position
     * @return void
     */
    public static function removeAt(array &$array, $position)
    {
        if ($position < 0 || $position > (count($array) - 1)) {
            return;
        }

        reset($array);

        for ($i = 0; $i < $position; $i++) {
            next($array);
        }

        $key = key($array);

        unset($array[$key]);
    }

    /**
     * Удаляет значение массива, находящееся в указанной позиции.
     *
     * @param  array &$array
     * @param  int $position
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeNotNullAt(array &$array, $position)
    {
        if ($position < 0 || $position > (count($array) - 1)) {
            throw new UnexpectedValueException(
                    "Позиция {$position} находится за пределами массива."
            );
        }

        reset($array);

        for ($i = 0; $i < $position; $i++) {
            next($array);
        }

        $key = key($array);

        unset($array[$key]);
    }

    /**
     * Удаляет значение списка, находящееся в указанной позиции.
     *
     * @param  array &$array
     * @param  int $position
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeNotNullFromListAt(array &$array, $position)
    {
        if ($position < 0 || $position > (count($array) - 1)) {
            throw new UnexpectedValueException(
                    "Позиция {$position} находится за пределами массива."
            );
        }

        reset($array);

        for ($i = 0; $i < $position; $i++) {
            next($array);
        }

        $key = key($array);

        unset($array[$key]);

        $array = array_values($array);
    }

    /**
     * Удаляет и возвращает первый элемент массива.
     *
     * @param  array &$array
     * @return mixed
     */
    public static function removeFirst(array &$array)
    {
        return array_shift($array);
    }

    /**
     * Удаляет и возвращает первый элемент массива.
     *
     * @param  array &$array
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function removeNotNullFirst(array &$array)
    {
        if (empty($array)) {
            throw new UnexpectedValueException(
                    "Первое значение не доступно так как массив пуст."
            );
        }

        return array_shift($array);
    }

    /**
     * Удаляет и возвращает последний элемент массива.
     *
     * @param  array &$array
     * @return mixed
     */
    public static function removeLast(array &$array)
    {
        return array_pop($array);
    }

    /**
     * Удаляет и возвращает последний элемент массива.
     *
     * @param  array &$array
     * @return mixed
     * @throws UnexpectedValueException
     */
    public static function removeNotNullLast(array &$array)
    {
        if (empty($array)) {
            throw new UnexpectedValueException(
                    "Последнее значение не доступно так как массив пуст."
            );
        }

        return array_pop($array);
    }

    /**
     * Удаляет все соответствующие значения массива.
     *
     * @param  array &$array
     * @param  mixed $value
     * @return void
     */
    public static function removeValue(array &$array, $value)
    {
        $keys = array_keys($array, $value, true);

        if (empty($keys)) {
            return;
        }

        foreach ($keys as $key) {
            unset($array[$key]);
        }
    }

    /**
     * Удаляет все существующие значения массива.
     *
     * Удаляет все существующие значения массива. Если массив не содержит
     * искомого значения, то будет выброшено исключение
     * UnexpectedValueException.
     *
     * @param  array &$array
     * @param  mixed $value
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeExistingValue(array &$array, $value)
    {
        $keys = array_keys($array, $value, true);

        if (empty($keys)) {
            throw new UnexpectedValueException(
                    "Значение не присутствует в массиве."
            );
        }

        foreach ($keys as $key) {
            unset($array[$key]);
        }
    }

    /**
     * Удаляет все существующие значения списка.
     *
     * Удаляет все существующие значения списка. Если списка не содержит
     * искомого значения, то будет выброшено исключение
     * UnexpectedValueException.
     *
     * @param  array &$array
     * @param  mixed $value
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeExistingValueFromList(array &$array, $value)
    {
        $keys = array_keys($array, $value, true);

        if (empty($keys)) {
            throw new UnexpectedValueException(
                    "Значение не присутствует в массиве."
            );
        }

        foreach ($keys as $key) {
            unset($array[$key]);
        }

        $array = array_values($array);
    }

    /**
     * Удаляет первое соответствующее значение массива.
     *
     * @param  array &$array
     * @param  mixed $value
     * @return void
     */
    public static function removeFirstValue(array &$array, $value)
    {
        $key = array_search($value, $array, true);

        if (false === $key) {
            return;
        }

        unset($array[$key]);
    }

    /**
     * Удаляет первое существующее значение массива.
     *
     * Удаляет первое существующее значение массива. Если массив не содержит
     * искомого значения, то будет выброшено исключение
     * UnexpectedValueException.
     *
     * @param  array &$array
     * @param  mixed $value
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeFirstExistingValue(array &$array, $value)
    {
        $key = array_search($value, $array, true);

        if (false === $key) {
            throw new UnexpectedValueException(
                    "Значение не присутствует в массиве."
            );
        }

        unset($array[$key]);
    }

    /**
     * Удаляет первый соответствующий объект массива.
     *
     * @param  array &$array
     * @param  object $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeFirstObject(array &$array, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $key = array_search($object, $array, true);

        if (false === $key) {
            return;
        }

        unset($array[$key]);
    }

    /**
     * Удаляет первый существующий объект массива.
     *
     * Удаляет первый существующий объект массива. Если массив не содержит
     * искомого объект, то будет выброшено исключение UnexpectedValueException.
     *
     * @param  array &$array
     * @param  object $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeFirstExistingObject(array &$array, $object,
                                                     $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $key = array_search($object, $array, true);

        if (false === $key) {
            throw new UnexpectedValueException(
                    "Значение не присутствует в массиве."
            );
        }

        unset($array[$key]);
    }

    /**
     * Удаляет все соответствующие объекты массива.
     *
     * @param  array &$array
     * @param  object $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeObject(array &$array, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $keys = array_keys($array, $object, true);

        if (empty($keys)) {
            return;
        }

        foreach ($keys as $key) {
            unset($array[$key]);
        }
    }

    /**
     * Удаляет все существующие объекты массива.
     *
     * Удаляет все существующие объекты массива. Если массив не содержит
     * искомого объекта, то будет выброшено исключение UnexpectedValueException.
     *
     * @param  array &$array
     * @param  object $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeExistingObject(array &$array, $object, $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $keys = array_keys($array, $object, true);

        if (empty($keys)) {
            throw new UnexpectedValueException(
                    "Значение не присутствует в массиве."
            );
        }

        foreach ($keys as $key) {
            unset($array[$key]);
        }
    }

    /**
     * Удаляет все существующие объекты списка.
     *
     * Удаляет все существующие объекты списка. Если списка не содержит
     * искомого объекта, то будет выброшено исключение UnexpectedValueException.
     *
     * @param  array &$array
     * @param  object $object
     * @param  string $type
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeExistingObjectFromList(array &$array, $object,
                                                        $type)
    {
        if (!$object instanceof $type) {
            throw new UnexpectedValueException(
                    "Объект не соответствует типу {$type}."
            );
        }

        $keys = array_keys($array, $object, true);

        if (empty($keys)) {
            throw new UnexpectedValueException(
                    "Значение не присутствует в массиве."
            );
        }

        foreach ($keys as $key) {
            unset($array[$key]);
        }

        $array = array_values($array);
    }

    /**
     * Удаляет ключи и значения первого массива, которые соответствуют ключам и
     * значениям второго.
     *
     * @param  array &$array
     * @param  array $remove
     * @return void
     */
    public static function removeArray(array &$array, array $remove)
    {
        foreach ($remove as $removeKey => $removeValue) {
            if (isset($array[$removeKey])
                    && $array[$removeKey] === $removeValue) {
                unset($array[$removeKey]);
            }
        }
    }

    /**
     * Удаляет значения первого массива, соответствующие значениям второго.
     *
     * @param  array &$array
     * @param  array $remove
     * @return void
     */
    public static function removeArrayValues(array &$array, array $remove)
    {
        foreach ($remove as $value) {
            $arrayKeys = array_keys($array, $value, true);

            if (empty($arrayKeys)) {
                continue;
            }

            foreach ($arrayKeys as $arrayKey) {
                unset($array[$arrayKey]);
            }
        }
    }

    /**
     * Удаляет ключи первого массива, соответствующие ключам второго массива.
     *
     * @param  array &$array
     * @param  array $remove
     * @return void
     */
    public static function removeArrayKeys(array &$array, array $remove)
    {
        foreach ($remove as $key => $value) {
            unset($array[$key]);
        }
    }

    /**
     * Удаляет ключи первого массива, соответствующие значениям второго.
     *
     * @param  array &$array
     * @param  array $keys
     * @return void
     */
    public static function removeKeysList(array &$array, array $keys)
    {
        foreach ($keys as $key) {
            unset($array[$key]);
        }
    }

    /**
     * Удаляет диапазон значений массива.
     *
     * @param  array &$array
     * @param  int $from
     * @param  int $to
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeRange(array &$array, $from, $to)
    {
        if (!is_int($from)) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} не является " .
                    "целым числом."
            );
        }

        if (!is_int($to)) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} не является " .
                    "целым числом."
            );
        }

        if ($from < 0) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} находится ниже нуля."
            );
        }

        if ($to <= $from) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} меньше или равен " .
                    "нижнему параметру диапазона {$from}."
            );
        }

        array_splice($array, $from, $to - $from + 1);
    }

    /**
     * Удаляет диапазон значений списка.
     *
     * @param  array &$array
     * @param  int $from
     * @param  int $to
     * @return void
     * @throws UnexpectedValueException
     */
    public static function removeListRange(array &$array, $from, $to)
    {
        self::ensureList($array);

        if (!is_int($from)) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} не является " .
                    "целым числом."
            );
        }

        if (!is_int($to)) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} не является " .
                    "целым числом."
            );
        }

        if ($from < 0) {
            throw new UnexpectedValueException(
                    "Нижний параметр диапазона {$from} находится ниже нуля."
            );
        }

        if ($to <= $from) {
            throw new UnexpectedValueException(
                    "Верхний параметр диапазона {$to} меньше или равен " .
                    "нижнему параметру диапазона {$from}."
            );
        }

        array_splice($array, $from, $to - $from + 1);
    }

    /**
     * Удаляет дубликаты из массива.
     *
     * @param  array &$array
     * @return void
     */
    public static function removeDuplicates(array &$array)
    {
        $array = array_unique($array, SORT_REGULAR);
    }

    /**
     * Фильтрует массив с помощью стандартной функции.
     *
     * Фильтрует массив с помощью стандартной функции. Стандартная функция
     * фильтрации отфильтровывает пустые значения.
     *
     * @param  array &$array
     * @return void
     */
    public static function filter(array &$array)
    {
        $array = array_filter($array);
    }

    /**
     * Фильтрует массив с помощью указанной функции.
     *
     * Фильтрует массив с помощью указанной функции. Указанная функция
     * фильтрации должна возвращать true для элементов, которые удовлетворяют
     * фильтру. Если указанная функция фильтрации не пригодна для вызова, то
     * будет выброшено исключение.
     *
     * @param  array &$array
     * @param  callback $filter
     * @return void
     * @throws InvalidArgumentException
     */
    public static function filterBy(array &$array, $filter)
    {
        if (!is_callable($filter)) {
            throw new InvalidArgumentException(
                    "Функция фильтрации не пригодна для вызова."
            );
        }

        $array = array_filter($array, $filter);
    }

    /**
     * Фильтрует массив как список с помощью стандартной функции.
     *
     * Фильтрует массив как список с помощью стандартной функции. Стандартная
     * функция фильтрации отфильтровывает пустые значения.
     *
     * @param  array &$array
     * @return void
     */
    public static function filterAsList(array &$array)
    {
        $array = array_values(array_filter($array));
    }

    /**
     * Фильтрует массив как список с помощью указанной функции.
     *
     * ФФильтрует массив как список с помощью указанной функции. Указанная
     * функция фильтрации должна возвращать true для элементов, которые
     * удовлетворяют фильтру. Если указанная функция фильтрации не пригодна для
     * вызова, то будет выброшено исключение.
     *
     * @param  array &$array
     * @param  callback $filter
     * @return void
     * @throws InvalidArgumentException
     */
    public static function filterAsListBy(array &$array, $filter)
    {
        if (!is_callable($filter)) {
            throw new InvalidArgumentException(
                    "Функция фильтрации не пригодна для вызова."
            );
        }

        $array = array_values(array_filter($array, $filter));
    }

    /**
     * Сортирует значения массива с помощью указанной функции без сохранения
     * ассоциативных связей между ключами и значениями.
     *
     * Сортирует значения массива с помощью указанной функции. Функция
     * сортировки должна возвращать целое, которое меньше, равно или больше
     * нуля, если первый аргумент является соответственно меньшим, равным или
     * большим чем второй. Если указанная функция сортировки не пригодна для
     * вызова, то будет выброшено исключение. Ассоциативные связи между ключами
     * и значениями будут утеряны.
     *
     * @param  array &$array
     * @param  callback $sorter
     * @return void
     * @throws InvalidArgumentException
     */
    public static function sortAsListBy(array &$array, $sorter)
    {
        if (!is_callable($sorter)) {
            throw new InvalidArgumentException(
                    'Функция сортировки не пригодна для вызова.'
            );
        }

        usort($array, $sorter);
    }

    /**
     * Сортирует значения массива по убыванию без сохранения ассоциативных
     * связей между ключами и значениями.
     *
     * @param  array &$array
     * @param  int $sortMode = SORT_REGULAR
     * @return void
     */
    public static function sortAsListByDescending(array &$array,
                                                  $sortMode = SORT_REGULAR)
    {
        rsort($array, $sortMode);
    }

    /**
     * Сортирует значения массива по возврастанию без сохранения ассоциативных
     * связей между ключами и значениями.
     *
     * @param  array &$array
     * @param  int $sortMode = SORT_REGULAR
     * @return void
     */
    public static function sortAsListByAscending(array &$array,
                                                 $sortMode = SORT_REGULAR)
    {
        sort($array, $sortMode);
    }

    /**
     * Сортирует значения массива с помощью указанной функции с сохранением
     * ассоциативных связей между ключами и значениями.
     *
     * Сортирует значения массива с помощью указанной функции. Функция
     * сортировки должна возвращать целое, которое меньше, равно или больше
     * нуля, если первый аргумент является соответственно меньшим, равным или
     * большим чем второй. Если указанная функция сортировки не пригодна для
     * вызова, то будет выброшено исключение. Ассоциативные связи между ключами
     * и значениями будут сохранены.
     *
     * @param  array &$array
     * @param  callback $sorter
     * @return void
     * @throws InvalidArgumentException
     */
    public static function sortAsHashBy(array &$array, $sorter)
    {
        if (!is_callable($sorter)) {
            throw new InvalidArgumentException(
                    'Функция сортировки не пригодна для вызова.'
            );
        }

        uasort($array, $sorter);
    }

    /**
     * Сортирует значения массива по убыванию с сохранением ассоциативных связей
     * между ключами и значениями.
     *
     * @param  array &$array
     * @param  int $sortMode = SORT_REGULAR
     * @return void
     */
    public static function sortAsHashByDescending(array &$array,
                                                  $sortMode = SORT_REGULAR)
    {
        arsort($array, $sortMode);
    }

    /**
     * Сортирует значения массива по возврастанию с сохранением ассоциативных
     * связей между ключами и значениями.
     *
     * @param  array &$array
     * @param  int $sortMode = SORT_REGULAR
     * @return void
     */
    public static function sortAsHashByAscending(array &$array,
                                                 $sortMode = SORT_REGULAR)
    {
        asort($array, $sortMode);
    }

    /**
     * Сортирует значения массива по алгоритму "естественного порядка" с
     * сохранением ассоциативных связей между ключами и значениями.
     *
     * @param  array &$array
     * @return void
     */
    public static function sortAsHashByNaturalOrder(array &$array)
    {
        natsort($array);
    }

    /**
     * Сортирует значения массива по алгоритму "естественного порядка" без учета
     * регистра с сохранением ассоциативных связей между ключами и значениями.
     *
     * @param  array &$array
     * @return void
     */
    public static function sortAsHashByNaturalOrderCaseInsensative(array &$array)
    {
        natcasesort($array);
    }

    /**
     * Сортирует ключи массива с помощью указанной функции с сохранением
     * ассоциативных связей между ключами и значениями.
     *
     * Сортирует ключи массива с помощью указанной функции. Функция сортировки
     * должна возвращать целое, которое меньше, равно или больше нуля, если
     * первый аргумент является соответственно меньшим, равным или большим чем
     * второй. Если указанная функция сортировки не пригодна для вызова, то
     * будет выброшено исключение. Ассоциативные связи между ключами и
     * значениями будут сохранены.
     *
     * @param  array &$array
     * @param  callback $sorter
     * @return void
     * @throws InvalidArgumentException
     */
    public static function sortAsHashKeysBy(array &$array, $sorter)
    {
        if (!is_callable($sorter)) {
            throw new InvalidArgumentException(
                    'Функция сортировки не пригодна для вызова.'
            );
        }

        uksort($array, $sorter);
    }

    /**
     * Сортирует ключи массива по убыванию с сохранением ассоциативных связей
     * между ключами и значениями.
     *
     * @param  array &$array
     * @param  int $sortMode = SORT_REGULAR
     * @return void
     */
    public static function sortAsHashKeysByDescending(array &$array,
                                                      $sortMode = SORT_REGULAR)
    {
        krsort($array, $sortMode);
    }

    /**
     * Сортирует ключи массива по возврастанию с сохранением ассоциативных
     * связей между ключами и значениями.
     *
     * @param  array &$array
     * @param  int $sortMode = SORT_REGULAR
     * @return void
     */
    public static function sortAsHashKeysByAscending(array &$array,
                                                     $sortMode = SORT_REGULAR)
    {
        ksort($array, $sortMode);
    }

    /**
     * Перемешивает элементы массива в случайном порядке без сохранения
     * ассоциативных связей между ключами и значениями.
     *
     * @param  array &$array
     * @return void
     */
    public static function shuffleAsList(array &$array)
    {
        shuffle($array);
    }

    /**
     * Устанавливает обратный порядок элементов массива.
     *
     * @param  array &$array
     * @return void
     */
    public static function reverse(array &$array)
    {
        $array = array_reverse($array);
    }

    /**
     * Очищает массив.
     *
     * @param  array &$array
     * @return void
     */
    public static function clear(array &$array)
    {
        $array = array();
    }

    /**
     * Возвращает длинну массива.
     *
     * @param  array $array
     * @return int
     */
    public static function count(array $array)
    {
        return count($array);
    }

    /**
     * Возвращает строку, состоящую из склееных через разделитель значений.
     *
     * @param  array $array
     * @param  string $separator = ', '
     * @return string
     */
    public static function implode(array $array, $separator = ', ')
    {
        return implode($separator, $array);
    }

    /**
     * Возвращает строку, состоящую из склееных через разделитель ключей.
     *
     * @param  array $array
     * @param  string $separator = ', '
     * @return string
     */
    public static function implodeKeys(array $array, $separator = ', ')
    {
        return implode($separator, array_keys($array));
    }

    /**
     * Переиндексирует массив как список без сохранения ассоциативных связей
     * между ключами и значениями.
     *
     * @param  array &$array
     * @return void
     */
    public static function reindexAsList(array &$array)
    {
        $array = array_values($array);
    }

    /**
     * Заменяет значения ключей первого массива значениями ключей второго
     * массива.
     *
     * Заменяет значения ключей первого массива значениями ключей второго
     * массива. Если первый массив не содержит ключ второго массива, то
     * соответствующий ключ и его значение будут добавлены в первый массив.
     *
     * @param  array &$array
     * @param  array $replacement
     * @return void
     */
    public static function replace(array &$array, array $replacement)
    {
        foreach ($replacement as $key => $value) {
            $array[$key] = $value;
        }
    }

    /**
     * Вклеивает второй массив в первый.
     *
     * @param  array &$array
     * @param  array $merged
     * @return void
     */
    public static function merge(array &$array, array $merged)
    {
        $array = array_merge($array, $merged);
    }

    /**
     * Вклеивает второй массив в первый сохраняя уникальность значений.
     *
     * @param  array &$array
     * @param  array $merged
     * @return void
     */
    public static function mergeUnique(array &$array, array $merged)
    {
        $array = array_merge($array, $merged);
        $array = array_unique($merged, SORT_REGULAR);
    }

    /**
     * Выполняет функцию для каждого элемента массива.
     *
     * Выполняет функцию для каждого элемента массива. Если функция вернет
     * false, то дальнейшая итерация будет прервана. Функция принимает значение
     * и ключ данного значения в качестве параметров. Значение массива
     * передается в функцию по ссылке. Если итерация была остановлена функцией,
     * то будет возвращено false, в противном случае будет возвращено true.
     *
     * @param  array &$array
     * @param  callback $callback
     * @return boolean
     * @throws InvalidArgumentException
     */
    public static function each(array &$array, $callback)
    {
        if (!is_callable($callback)) {
            throw new InvalidArgumentException(
                    'Функция обработки не пригодна для вызова.'
            );
        }

        foreach ($array as $key => &$value) {
            $result = call_user_func_array($callback, array(&$value, $key));

            if (false === $result) {
                return false;
            }
        }

        return true;
    }

    /**
     * Выполняет функцию для всех элементов массива.
     *
     * @param  array &$array
     * @param  callback $callback
     * @return void
     * @throws InvalidArgumentException
     */
    public static function every(array &$array, $callback)
    {
        if (!is_callable($callback)) {
            throw new InvalidArgumentException(
                    'Функция обработки не пригодна для вызова.'
            );
        }

        array_walk($array, $callback);
    }

}