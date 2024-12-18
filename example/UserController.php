<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use Illuminate\Routing\Controller;

final class UserController extends Controller
{
    public function store(UpdateUserProfileRequest $request)
    {
        // Validation is already handled; retrieve validated data
        $validated = $request->validated();

        return response()->json([
            'message' => 'User profile created successfully!',
            'data'    => $validated,
        ]);
    }

    public function update(UpdateUserProfileRequest $request)
    {
        $validated = $request->validated();

        return response()->json([
            'message' => 'User profile updated successfully!',
            'data'    => $validated,
        ]);
    }
}
