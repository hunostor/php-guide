<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 2018.07.16.
 * Time: 6:57
 */

namespace PhpGuide\Collection\Interfaces;

interface CollectionInterface
{
    /**
     * Add one item for Collection
     * @param $item
     * @return void
     */
    public function add($item);

    /**
     * if collection is empty return true, if not empty return false
     * @return bool
     */
    public function isEmpty();

    /**
     * get all items collection
     * @return array
     */
    public function getAll();

    /**
     * Get first item in array
     * @return mixed
     */
    public function first();

    /**
     * Get last item in array
     * @return mixed
     */
    public function last();

    /**
     * return count collection element
     * @return int
     */
    public function count(): int;

    /**
     * exist next item in collection
     * @return bool
     */
    public function isNext(): bool;

    /**
     * get next object if exists
     * if not exists return null
     * @return mixed | null
     */
    public function getNext();

    /**
     * rewind iteration to beginning
     * @return void
     */
    public function reset(): void;
}