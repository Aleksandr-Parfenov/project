<?php

class asf implements Countable, ArrayAccess, Iterator
{
    private $collection;

    public function __construct(array $array)
    {
        $this->collection = $array;

    }

    public function count()
    {
        return 10;
    }

    public function offsetExists($offset)
    {
        return isset($this->collection[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->collection[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->collection[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->collection[$offset]);
    }

    public function current()
    {
        return current($this->collection);
    }

    public function next()
    {
       return next($this->collection);
    }

    public function key()
    {
        return key($this->collection);
    }

    public function valid()
    {
        return true;
//        return valid($this->collection) method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }
}

$obj = new asf([1=>'asd',2=>'ggg']);

var_dump(count($obj));

foreach ($obj as $k=>$v){
    var_dump($k);
    var_dump($v);
}
$obj[1] = 'xui';
var_dump($obj[1]);
