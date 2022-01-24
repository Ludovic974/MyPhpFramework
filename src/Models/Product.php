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
        return number_format($this->price, 2);
    }

    public function getThumbnailId()
    {
        return $this->thumbnailId;
    }

    public function getDisabled()
    {
        return $this->disabled;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getThumbnail()
    {
        /**
         * ! Récuperer l'image du thumbnail
         */
        return $this->thumbnailId;
    }
}
