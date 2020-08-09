<?php

declare(strict_types=1);

namespace MichaelBiberich\TurbolinksLocationMiddleware\Tests;

use MichaelBiberich\TurbolinksLocationMiddleware\TurbolinksLocationMiddleware;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

final class TurbolinksLocationMiddlewareTest extends TestCase
{
    public function testProcess(): void
    {
        $httpMessageFactory = new Psr17Factory;
        $request = $httpMessageFactory->createServerRequest('GET', '/test');
        $handler = new RequestHandlerStub($httpMessageFactory);
        $unprocessedResponse = $handler->handle($request);
        $middleware = new TurbolinksLocationMiddleware;
        $processedResponse = $middleware->process($request, $handler);
        $headerName = TurbolinksLocationMiddleware::HEADER_NAME;

        $this->assertFalse($unprocessedResponse->hasHeader($headerName));
        $this->assertTrue($processedResponse->hasHeader($headerName));
        $this->assertSame(
            $processedResponse->getHeaderLine($headerName),
            (string)$request->getUri(),
        );
    }
}
