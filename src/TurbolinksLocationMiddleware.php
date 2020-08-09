<?php

declare(strict_types=1);

namespace MichaelBiberich\TurbolinksLocationMiddleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class TurbolinksLocationMiddleware implements MiddlewareInterface
{
    public const HEADER_NAME = 'Turbolinks-Location';

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        return $handler->handle($request)
            ->withHeader(self::HEADER_NAME, (string)$request->getUri());
    }
}
