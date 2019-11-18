<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator;

use LogicException;
use App\Parser\Modifier\Condition\Operator\Comparator\EmptyOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\EqOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\GteqOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\GtOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\IdenOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\InIdenOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\InOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\LteqOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\LtOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\NeqOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\NidenOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\NinIdenOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\NinOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\NotNullOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\NullOperator;
use App\Parser\Modifier\Condition\Operator\Comparator\RegexpOperator;
use App\Parser\Modifier\Condition\Operator\Logical\AndOperator;
use App\Parser\Modifier\Condition\Operator\Logical\NandOperator;
use App\Parser\Modifier\Condition\Operator\Logical\NorOperator;
use App\Parser\Modifier\Condition\Operator\Logical\OrOperator;
use App\Parser\Modifier\Condition\Operator\Logical\XnorOperator;
use App\Parser\Modifier\Condition\Operator\Logical\XorOperator;
use function array_map;
use function array_merge_recursive;
use function sprintf;

final class OperatorPool
{
    public const TYPE_LOGICAL = 'logical';
    public const TYPE_COMPARATOR = 'comparator';

    /**
     * Default operators code and class name listed by types
     *
     * @var array
     */
    private const DEFAULT_OPERATORS = [
        OperatorPool::TYPE_COMPARATOR => [
            EmptyOperator::CODE => EmptyOperator::class,
            EqOperator::CODE => EqOperator::class,
            GteqOperator::CODE => GteqOperator::class,
            GtOperator::CODE => GtOperator::class,
            IdenOperator::CODE => IdenOperator::class,
            InIdenOperator::CODE => InIdenOperator::class,
            InOperator::CODE => InOperator::class,
            LteqOperator::CODE => LteqOperator::class,
            LtOperator::CODE => LtOperator::class,
            NeqOperator::CODE => NeqOperator::class,
            NidenOperator::CODE => NidenOperator::class,
            NinIdenOperator::CODE => NinIdenOperator::class,
            NinOperator::CODE => NinOperator::class,
            NotNullOperator::CODE => NotNullOperator::class,
            NullOperator::CODE => NullOperator::class,
            RegexpOperator::CODE => RegexpOperator::class,
        ],
        OperatorPool::TYPE_LOGICAL => [
            AndOperator::CODE => AndOperator::class,
            OrOperator::CODE => OrOperator::class,
            XorOperator::CODE => XorOperator::class,
            NandOperator::CODE => NandOperator::class,
            NorOperator::CODE => NorOperator::class,
            XnorOperator::CODE => XnorOperator::class,
        ],
    ];

    /**
     * @var array[\App\Parser\Modifier\Condition\Operator\OperatorInterface[]]
     */
    private $operators = [];

    public function __construct(array $operators = [])
    {
        $typeOperators = array_merge_recursive($this->retrieveDefaultOperators(), $operators);

        foreach ($typeOperators as $type => $operatorList) {
            foreach ($operatorList as $operatorCode => $operator) {
                $this->addOperator($type, $operatorCode, $operator);
            }
        }
    }

    public function getOperator(string $type, string $operatorCode): OperatorInterface
    {
        if (!isset($this->operators[$type][$operatorCode])) {
            throw new LogicException(
                sprintf('No registered operator for the type "%s" and code "%s".', $type, $operatorCode)
            );
        }

        return $this->operators[$type][$operatorCode];
    }

    public function addOperator(string $type, string $operatorCode, OperatorInterface $operator): OperatorPool
    {
        if (!isset($this->operators[$type][$operatorCode])) {
            if (!isset($this->operators[$type])) {
                $this->operators[$type] = [];
            }

            $this->operators[$type][$operatorCode] = $operator;
        }

        return $this;
    }

    private function retrieveDefaultOperators(): array
    {
        return array_map(static function ($operators) {
            return array_map(static function ($operator) {
                return new $operator();
            }, $operators);
        }, self::DEFAULT_OPERATORS);
    }
}
