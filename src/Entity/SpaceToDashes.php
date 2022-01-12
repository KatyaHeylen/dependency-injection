<?php

namespace App\Entity;


class SpaceToDashes implements Transform

{
public function transform(string $string): string
{
    preg_replace('/[[:space:]]+/', '-', $string);
    return $string;
}
}