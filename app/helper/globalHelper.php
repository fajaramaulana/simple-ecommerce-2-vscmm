<?php 

function changeFormatRupiah($number){
    $rupiah = number_format($number,0,',','.');
    return 'Rp ' . $rupiah;
}