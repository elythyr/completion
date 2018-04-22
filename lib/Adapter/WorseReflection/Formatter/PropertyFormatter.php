<?php

namespace Phpactor\Completion\Adapter\WorseReflection\Formatter;

use Phpactor\WorseReflection\Core\Reflection\ReflectionProperty;

class PropertyFormatter implements Formatter
{
    public function canFormat($object): bool
    {
        return $object instanceof ReflectionProperty;
    }

    public function format(ObjectFormatter $formatter, $object): string
    {
        assert($object instanceof ReflectionProperty);

        $info = [
            substr((string) $object->visibility(), 0, 3),
        ];

        if ($object->isStatic()) {
            $info[] = ' static';
        }

        $info[] = ' ';
        $info[] = '$' . $object->name();

        if ($object->inferredTypes()->best()->isDefined()) {
            $info[] = ': ' . $object->inferredTypes()->best()->short();
        }

        return implode('', $info);
    }

}
