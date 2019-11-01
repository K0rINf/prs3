<?php

namespace App\Parser\Type;

use Symfony\Component\Validator\Constraints as Assert;

class ExtractConfig extends TypeConfigAbstract
{
    /**
     * @Assert\NotBlank
     */
    private $path;

    /**
     * ExtractConfig constructor.
     *
     * @param $path
     */
    public function __construct(string $path)
    {
        // @todo проверить css3 или XPath
        $this->path = $path;
    }


    public function getPath() {
        return $this->path;
    }
}
