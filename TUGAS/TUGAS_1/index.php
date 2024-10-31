<?php
require_once 'classes/Buku.php';
require_once 'classes/Anggota.php';
require_once 'classes/Peminjaman.php';

use LibrarySystem\Buku;
use LibrarySystem\Peminjaman;

$buku1 = new Buku("NgodingJS", "Membahas tentang javascript", "Hisyam", "978-3-16-148410-0");
$buku2 = new Buku("NgodingC++", "Membahas tentang C++", "Kamil", "978-0-345-33968-3");
$buku3 = new Buku("NgodingPHP", "Membahas tentang PHP", "Hasyim", "978-0-452-28423-4");

$peminjaman1 = new Peminjaman("Budi", "Library Member", "12345", "Silver", $buku1, 7);
$peminjaman2 = new Peminjaman("Bagas", "Library Member", "67890", "Gold", $buku2, 14);
$peminjaman3 = new Peminjaman("Bagus", "Library Member", "11223", "Regular", $buku3, 5);

echo $peminjaman1;
echo "\n\n";
echo $peminjaman2;
echo "\n\n";
echo $peminjaman3;
