<?php

final class Terbilang
{
    private function penyebut($nilai)
    {
        // absolute value
        $nilai < 0 ? $nilai = gmp_strval(gmp_abs($nilai)) : $nilai;

        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . " Belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . " Puluh" . $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . " Ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < gmp_strval(gmp_pow(10, 6))) {
            $temp = $this->penyebut(gmp_strval(gmp_div($nilai, gmp_pow(10, 3)))) . " Ribu" . $this->penyebut(gmp_strval(gmp_mod($nilai, gmp_pow(10, 3))));
        } else if ($nilai < gmp_strval(gmp_pow(10, 9))) {
            $temp = $this->penyebut(gmp_strval(gmp_div($nilai, gmp_pow(10, 6)))) . " Juta" . $this->penyebut(gmp_strval(gmp_mod($nilai, gmp_pow(10, 6))));
        } else if ($nilai < gmp_strval(gmp_pow(10, 12))) {
            $temp = $this->penyebut(gmp_strval(gmp_div($nilai, gmp_pow(10, 9)))) . " Milyar" . $this->penyebut(gmp_strval(gmp_mod($nilai, gmp_pow(10, 9))));
        } else if ($nilai < gmp_strval(gmp_pow(10, 15))) {
            $temp = $this->penyebut(gmp_strval(gmp_div($nilai, gmp_pow(10, 12)))) . " Triliun" . $this->penyebut(gmp_strval(gmp_mod($nilai, gmp_pow(10, 12))));
        } else if ($nilai < gmp_strval(gmp_pow(10, 18))) {
            $temp = $this->penyebut(gmp_strval(gmp_div($nilai, gmp_pow(10, 15)))) . " Kuadriliun" . $this->penyebut(gmp_strval(gmp_mod($nilai, gmp_pow(10, 15))));
        } else if ($nilai < gmp_strval(gmp_pow(10, 21))) {
            $temp = $this->penyebut(gmp_strval(gmp_div($nilai, gmp_pow(10, 18)))) . " Kuantiliun" . $this->penyebut(gmp_strval(gmp_mod($nilai, gmp_pow(10, 18))));
        } else if ($nilai < gmp_strval(gmp_pow(10, 24))) {
            $temp = $this->penyebut(gmp_strval(gmp_div($nilai, gmp_pow(10, 21)))) . " Sekstiliun" . $this->penyebut(gmp_strval(gmp_mod($nilai, gmp_pow(10, 21))));
        } else if ($nilai < gmp_strval(gmp_pow(10, 27))) {
            $temp = $this->penyebut(gmp_strval(gmp_div($nilai, gmp_pow(10, 24)))) . " Septiliun" . $this->penyebut(gmp_strval(gmp_mod($nilai, gmp_pow(10, 24))));
        } else if ($nilai < gmp_strval(gmp_pow(10, 30))) {
            $temp = $this->penyebut(gmp_strval(gmp_div($nilai, gmp_pow(10, 27)))) . " Oktiliun" . $this->penyebut(gmp_strval(gmp_mod($nilai, gmp_pow(10, 27))));
        } else if ($nilai < gmp_strval(gmp_pow(10, 33))) {
            $temp = $this->penyebut(gmp_strval(gmp_div($nilai, gmp_pow(10, 30)))) . " Noniliun" . $this->penyebut(gmp_strval(gmp_mod($nilai, gmp_pow(10, 30))));
        } else if ($nilai < gmp_strval(gmp_pow(10, 36))) {
            $temp = $this->penyebut(gmp_strval(gmp_div($nilai, gmp_pow(10, 33)))) . " Desiliun" . $this->penyebut(gmp_strval(gmp_mod($nilai, gmp_pow(10, 33))));
        }
        return $temp;
    }

    public function angkaTerbilang($nilai)
    {
        // clean special character
        $nilai = $this->cleanSpecialChar($nilai);

        if ($nilai < 0 && !empty($this->penyebut($nilai))) {
            $hasil = "Minus " . trim($this->penyebut($nilai));
        } elseif ($nilai > 0) {
            $hasil = trim($this->penyebut($nilai));
        } else {
            $hasil = 'Invalid Input';
        }
        return $hasil;
    }

    private function cleanSpecialChar($nilai)
    {
        // clean special character
        $nilai = preg_replace('/[^0-9\-]/', '', $nilai);
        if (preg_match('/[0-9]/', $nilai)) {
            // clean one last character in if not followed by number
            $check = true;
            while ($check) {
                if (preg_match('/[-]/', $nilai[-1])) {
                    $nilai = rtrim($nilai, $nilai[-1]);
                } else {
                    $check = false;
                }
            }
            return $nilai;
        } else {
            return 0;
        }
    }
}
