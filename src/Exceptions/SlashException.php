<?php

namespace Spatie\SlashCommand\Exceptions;

use Exception;
use Spatie\SlashCommand\Attachment;
use Spatie\SlashCommand\Request;
use Spatie\SlashCommand\Response;

class SlashException extends Exception
{
    public function getResponse(Request $request): Response
    {
        return Response::create($request)
            ->withAttachment(Attachment::create()
                ->setText($this->getMessage())
                ->setFallback($this->getMessage())
                ->setColor('danger')
            );
    }
}
