<?php 
include_once('../Terbilang.php');
$terbilang = new Terbilang();
isset($_POST['angkaTerbilang']) ? $angkaTerbilang = $terbilang->angkaTerbilang($_POST['angkaTerbilang']) :  $angkaTerbilang = '';
echo $angkaTerbilang;