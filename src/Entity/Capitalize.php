<?php

namespace App\Entity;

class Capitalize implements Transform

{
    public function transform(String $string): String
    {
        $capString = strtolower($string);

        for ($i = 0, $len = strlen($capString); $i < $len; $i += 2)
        {
            $capString[$i] = strtoupper($capString[$i]);
        }

        return $capString;
    }
}