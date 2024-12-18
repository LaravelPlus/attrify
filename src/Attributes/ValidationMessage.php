<?php

declare(strict_types=1);

namespace Laravelplus\Attrify\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final class ValidationMessage
{
    /**
     * @param  array<string, string>  $messages  Custom validation messages.
     */
    public function __construct(
        public array $messages
    ) {}
}
