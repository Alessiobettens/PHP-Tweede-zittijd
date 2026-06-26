<?php

class TodoList {
    private $title;

    public function setTitle($title) {
        if (empty($title)) {
            throw new Exception("Titel mag niet leeg zijn");
        }
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }
}