<?php

namespace LibrarySystem;

require_once 'abstract/Entity.php';

class Buku extends Entity
{
    private $author;
    private $isbn;

    public function __construct($name, $description, $author, $isbn)
    {
        parent::__construct($name, $description);
        $this->author = $author;
        $this->isbn = $isbn;
    }

    public function getDetails()
    {
        return "Judul Buku: $this->name, Penulis: $this->author, ISBN: $this->isbn, Info: $this->description";
    }
}
