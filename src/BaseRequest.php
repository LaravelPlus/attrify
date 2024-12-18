<?php

declare(strict_types=1);

namespace Laravelplus\Attrify;

use Illuminate\Foundation\Http\FormRequest;
use Laravelplus\Attrify\Attributes\ValidationMessage;
use Laravelplus\Attrify\Attributes\ValidationRule;
use ReflectionClass;

abstract class BaseRequest extends FormRequest
{
    public function rules(): array
    {
        return $this->parseAttributes(ValidationRule::class);
    }

    public function messages(): array
    {
        return $this->parseAttributes(ValidationMessage::class);
    }

    private function parseAttributes(string $attributeClass): array
    {
        $results = [];
        $reflection = new ReflectionClass($this);

        foreach ($reflection->getProperties() as $property) {
            $propertyName = $property->getName();
            foreach ($property->getAttributes($attributeClass) as $attribute) {
                $instance = $attribute->newInstance();

                if ($attributeClass === ValidationRule::class) {
                    $results[$propertyName] = $instance->rules;
                } elseif ($attributeClass === ValidationMessage::class) {
                    $results = array_merge($results, [$propertyName => $instance->messages]);
                }
            }
        }

        return $results;
    }
}
