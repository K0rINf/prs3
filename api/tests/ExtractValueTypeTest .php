<?php

namespace App\Tests;

use App\Parser\Type\Extractor\Extraction\ExtractValueType;
use PHPUnit\Framework\TestCase;

class ExtractValueTypeTest extends TestCase
{
    protected static $html = '<html><body><div class="self">vvv</div></body></html>';

    public function testExtractor(): void
    {
        $extractValueType = new ExtractValueType([
            'path' => '.self',
            'output' => 'name',
        ]);

        $value = $extractValueType->extract('.self', self::$html);
        $this->assertEquals($value, 'vvv');
    }
}
