<?php

namespace App\Entity;

class Logger
{
 public function log(string $message)
 {
     file_put_contents('../log.info', PHP_EOL . $message, FILE_APPEND);
 }
}