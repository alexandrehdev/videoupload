<?php

namespace App\Usecases\Video\Upload;


class Input{

    /**
     * 
     */
    public function __construct(
        public string $file
    ){}
}