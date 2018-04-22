<?php

namespace Phpactor\Completion\Adapter\WorseReflection\Formatter;

use Phpactor\WorseReflection\Core\Inference\Variable;
use Phpactor\Completion\Core\Formatter\Formatter;
use Phpactor\Completion\Core\Formatter\ObjectFormatter;

class VariableFormatter implements Formatter
{
    public function canFormat($object): bool
    {
        return $object instanceof Variable;
    }

    public function format(ObjectFormatter $formatter, $object): string
    {
        assert($object instanceof Variable);

        return $formatter->format($object->symbolContext()->types());
    }
}
