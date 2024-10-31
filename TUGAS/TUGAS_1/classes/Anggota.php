<?php

namespace LibrarySystem;

require_once 'abstract/Entity.php';

class Anggota extends Entity
{
    protected $memberID;
    protected $membershipType;

    public function __construct($name, $description, $memberID, $membershipType)
    {
        parent::__construct($name, $description);
        $this->memberID = $memberID;
        $this->membershipType = $membershipType;
    }

    public function getDetails()
    {
        return "Nama Anggota: $this->name, ID Anggota: $this->memberID, Tipe: $this->membershipType, Info: $this->description";
    }
}
