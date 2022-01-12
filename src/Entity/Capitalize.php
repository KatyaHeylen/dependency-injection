<?php

namespace App\Entity;

class Capitalize implements Transform

{
    public function transform(string $string): string
    {
         preg_replace('/(\w)(.)?/e', "strtoupper('$1').strtolower('$2')", 'test example');
         return $string;
    }
}