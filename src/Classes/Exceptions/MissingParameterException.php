<?php

namespace Creative2\Umami\Classes\Exceptions;

class MissingParameterException extends \Exception
{
    public function __construct(string $action, array $missingParameters)
    {
        $parameters = str('parameter')->plural(count($missingParameters));
        $this->message = "Missing {$parameters} for action '$action': ".implode(', ', $missingParameters);
    }
}
