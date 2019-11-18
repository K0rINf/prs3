<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Node;

/**
 * @api
 */
interface ConditionInterface extends NodeInterface
{
    /**
     * Retrieve the value key identifier to compare
     *
     * @return string
     */
    public function getValueIdentifier(): string;

    /**
     * Set the value key identifier to compare
     *
     * @param string $identifier
     * @return ConditionInterface
     */
    public function setValueIdentifier(string $identifier): ConditionInterface;

    /**
     * Retrieve the value to compare
     *
     * @return mixed
     */
    public function getValueCompare();

    /**
     * Set the value to compare
     *
     * @param mixed $value
     * @return ConditionInterface
     */
    public function setValueCompare($value): ConditionInterface;
}
