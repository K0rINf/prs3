<?php

namespace App\Tests;

use App\Parser\Context;
use App\Parser\Output;
use App\Parser\Type\Extractor\AbstractExtractorType;
use PHPUnit\Framework\TestCase;
use Symfony\Component\BrowserKit\Response;

class AbstractExtractorTypeTest extends TestCase
{
    protected $output;
    protected $context;
    protected static $html = '<html><body><div class="self">vvv</div></body></html>';

    public function setUp(): void
    {
        $this->output = $this->createMock(Output::class);
        $this->context = $this->createMock(Context::class);
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testExtractorContextSet(): void
    {
        $this->output->expects($this->once())
            ->method('set')
            ->with(
                'name',
                null
            );
        $this->context->method('getLastResponse')
            ->willReturn(new Response(self::$html));
        $this->context->method('getOutput')
            ->willReturn($this->output);

        $extractorType = $this->getMockForAbstractClass(
            AbstractExtractorType::class,
            [
                'options' => [
                    'output' => 'name',
                    'path' => '.path'
                ],
            ]
        );

        $extractorType->run($this->context);
    }

    public function testExtractorContextAppend(): void
    {
        $this->output->expects($this->once())
            ->method('add')
            ->with(
                'name',
                null
            );
        $this->context->method('getLastResponse')
            ->willReturn(new Response(self::$html));
        $this->context->method('getOutput')
            ->willReturn($this->output);

        $extractorType = $this->getMockForAbstractClass(
            AbstractExtractorType::class,
            [
                'options' => [
                    'output' => 'name',
                    'path' => '.path',
                    'append' => true,
                ],
            ]
        );

        $extractorType->run($this->context);
    }
}
