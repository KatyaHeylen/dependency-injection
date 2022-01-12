<?php

namespace App\Entity;

class Logger
{
 public function log(string $message)
 {
     file_put_contents('../log.info', $message);
 }
}