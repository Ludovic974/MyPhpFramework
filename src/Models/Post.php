<?php

namespace Framework\App\Models;

use DateTime;

class Post extends Model
{
    private int $id;
    private string $title;
    private string $slug;
    private string $excerpt;
    private string $content;
    private int $thumbnailId;
    private int $authorId;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private DateTime $publishedAt;
    
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getExcerpt()
    {
        return $this->excerpt;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getThumbnailId()
    {
        return $this->thumbnailId;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }
}
