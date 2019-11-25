<?php

namespace App\Tests;

use App\Parser\Context;
use App\Parser\Output;
use App\Parser\Type\Extractor\Extraction\ExtractValueType;
use PHPUnit\Framework\TestCase;
use Symfony\Component\BrowserKit\Response;

class ExtractValueTypeTest extends TestCase
{
    public function testExtractor()
    {
        $extractorType = new ExtractValueType([
            'path' => '.self',
            'output' => 'name',
            'append' => false,
        ]);

        $output = $this->createMock(Output::class);
        $context = $this->createMock(Context::class);

        $context->method('getLastResponce')
            ->willReturn(new Response('<html><body><div class="self">vvv</div></body></html>'));
        $context->method('getOutput')->
            ->willReturn($output);

        $extractorType->run($context);
        $context->getOutput()->add('name', 123);
        dd($context->getOutput()->get('name'));
        $value = $context->getOutput()->get('name');

        // assert that your calculator added the numbers correctly!
        $this->assertEquals('vvv', $value);
    }
}
