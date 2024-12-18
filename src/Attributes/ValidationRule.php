<?php

declare(strict_types=1);

namespace Laravelplus\Attrify\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
final class ValidationRule
{
    public function __construct(
        public string $rules
    ) {}
}
