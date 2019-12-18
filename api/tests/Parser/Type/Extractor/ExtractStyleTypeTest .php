<?php

namespace App\Tests;

use App\Parser\Type\Extractor\Extraction\ExtractStyleType;
use PHPUnit\Framework\TestCase;

class ExtractStyleTypeTest extends TestCase
{
    protected static $html = '<html><body><div class="self" style="display:block;text-align:center">vvv</div></body></html>';

    public function testExtractor(): void
    {
        $extractValueType = new ExtractStyleType([
            'path' => '.self',
            'output' => 'name',
        ]);

        $value = $extractValueType->extract('.self', self::$html);
        $this->assertEquals($value, 'display:block;text-align:center');
    }
}
