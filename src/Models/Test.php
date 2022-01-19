<?php

namespace Framework\App\Models;

class Test extends Model
{
    private int $id;
    private int $a;
    private int $b;
    private int $c;

    public function getId()
    {
        return $this->id;
    }

    public function getA()
    {
        return $this->a;
    }

    public function getB()
    {
        return $this->b;
    }

    public function getC()
    {
        return $this->c;
    }
}
