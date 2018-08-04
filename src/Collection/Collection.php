<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 2018.07.16.
 * Time: 6:55
 */

namespace PhpGuide\Collection;

use PhpGuide\Collection\Interfaces\CollectionInterface;

class Collection implements CollectionInterface, \Iterator
{
    protected $collection = [];
    protected $class;

    /**
     * iteration current item
     * @var int
     */
    protected $current = 0;

    /**
     * all element count
     * @var int
     */
    protected $count = 0;

    public function __construct($className)
    {
        $this->class = $className;
    }

    /**
     * Add one item for Collection
     * @param $item;
     * @return void
     */
    public function add($item)
    {
        if($this->typeCheck($item)) {
            $this->collection[] = $item;
            $this->count++;
        } else {
            throw new \InvalidArgumentException("Not the type allowed in the collection!");
        }
    }

    private function typeCheck($item)
    {
        return $item instanceof $this->class;
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return current($this->collection);
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        next($this->collection);
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return key($this->collection);
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return key($this->collection) !== null;
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        reset($this->collection);
    }

    /**
     * if collection is empty return true, if not empty return false
     * @return bool
     */
    public function isEmpty()
    {
        return count($this->collection) === 0 ? true : false;
    }

    /**
     * get all items collection
     * @return array
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * Get first item in array
     * @return mixed
     */
    public function first()
    {
        return $this->collection[0];
    }

    /**
     * Get last item in array
     * @return mixed
     */
    public function last()
    {
        $count = $this->count();
        return $this->collection[$count-1];
    }

    /**
     * return count collection element
     * @return int
     */
    public function count(): int
    {
        return $this->count;
    }


    /**
     * exist next item in collection
     * @return bool
     */
    public function isNext(): bool
    {
        return $this->count > $this->current ? true : false;
    }

    /**
     * get next object if exists
     * if not exists return null
     * @return mixed | null
     */
    public function getNext()
    {
        if(! $this->isNext()) {
            return null;
        }

        if($this->isNext()) {
            $next = $this->collection[$this->current];
            $this->current++;
            return $next;
        }
    }

    /**
     * rewind iteration to beginning
     * @return void
     */
    public function reset(): void
    {
        $this->current = 0;
    }
}