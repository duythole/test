<?php

namespace Testcenter\Testcenter\Models;

use Iterator;
use Countable;

class PublicTests implements Iterator, Countable
{
    private $position = 0;
    private $array = [];

    public function __construct($array)
    {
        foreach ($array as $publicTestRawData) {
            $publicTest = new PublicTest($publicTestRawData);
            $this->array[] = $publicTest;
        }
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->array[$this->position]);
    }

    public function count() {
        return count($this->array);
    }
}
