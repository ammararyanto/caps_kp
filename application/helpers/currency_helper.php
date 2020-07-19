<?php

function rupiah($angka)
{
    $hasil_rupiah = "Rp&nbsp" . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function rupiahnota($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
