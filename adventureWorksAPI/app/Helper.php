<?php

namespace App;

class Helper
{
    //generates varbinary(16) GUID code for MySQL db entry
    public static function generateGUID(){
        $GUID = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

        $binary = hex2bin($GUID);

        return $binary;
    }

}
