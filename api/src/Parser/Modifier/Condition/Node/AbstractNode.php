<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Node;

abstract class AbstractNode implements NodeInterface
{
    /**
     * @var null|CombineInterface
     */
    private $parent;

    public function getParent(): ?CombineInterface
    {
        return $this->parent;
    }

    public function setParent(?CombineInterface $combine): NodeInterface
    {
        $this->parent = $combine;

        return $this;
    }

    public function hasParent(): bool
    {
        return $this->parent !== null;
    }
}
