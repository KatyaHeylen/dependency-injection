<?php

namespace App\Entity;

class Master
{
    private Transform $transform;
    private Logger $logger;

    /**
     * @param Transform $transform
     * @param Logger $logger
     */
    public function __construct(Transform $transform, Logger $logger)
    {
        $this->transform = $transform;
        $this->logger = $logger;
    }
    public function logShowMessage(String $message):String {

        $this->transform->transform($message);
        $this->logger->log($message);
        return $this->transform->transform($message);
    }


}