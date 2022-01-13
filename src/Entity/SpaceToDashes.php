<?php

namespace App\Entity;


class SpaceToDashes implements Transform

{
public function transform(string $string): string
{
    return str_replace(' ', '-', $string);
}
}