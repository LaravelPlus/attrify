<?php

declare(strict_types=1);

namespace Laravelplus\Attrify;

use Laravelplus\Attrify\Attributes\ValidationMessage;
use Laravelplus\Attrify\Attributes\ValidationRule;
use ReflectionClass;

final class Attrify
{
    /**
     * Parse validation rules and messages from a given class.
     *
     * @return array{rules: array, messages: array}
     */
    public function parse(object $request): array
    {
        $rules = [];
        $messages = [];

        $reflection = new ReflectionClass($request);

        foreach ($reflection->getProperties() as $property) {
            $propertyName = $property->getName();

            // Extract ValidationRule attributes
            foreach ($property->getAttributes(ValidationRule::class) as $attribute) {
                /** @var ValidationRule $instance */
                $instance = $attribute->newInstance();
                $rules[$propertyName] = $instance->rules;
            }

            // Extract ValidationMessage attributes
            foreach ($property->getAttributes(ValidationMessage::class) as $attribute) {
                /** @var ValidationMessage $instance */
                $instance = $attribute->newInstance();
                $messages[$propertyName] = $instance->messages;
            }
        }

        return ['rules' => $rules, 'messages' => $messages];
    }
}
