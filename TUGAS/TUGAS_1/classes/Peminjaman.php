<?php

namespace LibrarySystem;

require_once 'Anggota.php';
require_once 'traits/DiscountTrait.php';

class Peminjaman extends Anggota
{
    use DiscountTrait;

    private $buku;
    private $loanDuration;
    private $discount;

    public function __construct($name, $description, $memberID, $membershipType, $buku, $loanDuration)
    {
        parent::__construct($name, $description, $memberID, $membershipType);
        $this->buku = $buku;
        $this->loanDuration = $loanDuration;
        $this->discount = $this->calculateDiscount($membershipType);
    }

    // Magic method __toString untuk menampilkan detail peminjaman
    public function __toString()
    {
        return "Detail Peminjaman Buku\n" .
            "Anggota: {$this->name} (ID: {$this->memberID}), Tipe: {$this->membershipType}\n" .
            "{$this->buku->getDetails()}\n" .
            "Durasi Pinjaman: {$this->loanDuration} hari\n" .
            "Diskon: {$this->discount}%";
    }
}
