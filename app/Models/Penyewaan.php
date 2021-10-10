<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    protected $table = 'penyewaan';
    protected $primaryKey = 'id_penyewaan';

    static function getReqCode() {
        $sDocument = "";
        $last_number  = Penyewaan::orderBy('created_at', 'desc')->orderBy('kode_penyewaan', 'desc')->first();

        $sCurrentDB = $last_number ? $last_number->kode_penyewaan : null;
        $sLetterHead = $sDocument . date("y") . date("m") . date("d");
        $nDocumentLength = strlen($sDocument);
        if ($sCurrentDB) {
            if ((substr($sCurrentDB, $nDocumentLength, 2) == date("y")) and (substr($sCurrentDB, ($nDocumentLength + 2), 2) == date("m")) and (substr($sCurrentDB, ($nDocumentLength + 4), 2) == date("d"))) $sLetterNumber = substr($sCurrentDB, ($nDocumentLength + 6), 8) + 1;
            else $sLetterNumber = "1";
        } else {
            $sLetterNumber = "1";
        }

        $nLetterNumberLength = strlen($sLetterNumber);
        switch ($nLetterNumberLength) {
            case 1 : $sLetterNumber = "0".$sLetterNumber;
            case 2 : $sLetterNumber = "0".$sLetterNumber;
            case 3 : $sLetterNumber = "0".$sLetterNumber;
        }
        $sValue = $sLetterHead.$sLetterNumber;
        return $sValue;
    }
}
