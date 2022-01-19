<?php

namespace Framework\App\Models;

class Product extends Model
{
    private int $id;
    private string $name;
    private string $slug;
    private string $excerpt;
    private string $description;
    private float $price;
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getExcerpt()
    {
        return $this->excerpt;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
