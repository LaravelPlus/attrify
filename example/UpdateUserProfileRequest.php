<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Laravelplus\Attrify\Attributes\ValidationMessage;
use Laravelplus\Attrify\Attributes\ValidationRule;
use Laravelplus\Attrify\BaseRequest;

final class UpdateUserProfileRequest extends BaseRequest
{
    #[ValidationRule('required|string|max:50|alpha_dash|unique:users,username')]
    #[ValidationMessage([
        'required' => 'The username is required.',
        'string'   => 'The username must be a string.',
        'max'      => 'The username may not be greater than 50 characters.',
        'alpha_dash' => 'The username may only contain letters, numbers, dashes, and underscores.',
        'unique'   => 'This username is already taken.',
    ])]
    public string $username;

    #[ValidationRule('required|email|max:255|unique:users,email')]
    public string $email;

    #[ValidationRule('nullable|image|max:1024|mimes:jpg,jpeg,png')]
    public ?string $profile_photo;

    #[ValidationRule('nullable|string|max:300')]
    public ?string $bio;
}
