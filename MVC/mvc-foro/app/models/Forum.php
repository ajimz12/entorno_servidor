<?php

class Forum
{

    private $id;
    private $title;
    private $description;
    private $visibility;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->visibility = $data['visibility'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getVisibility()
    {
        return $this->visibility;
    }
}
