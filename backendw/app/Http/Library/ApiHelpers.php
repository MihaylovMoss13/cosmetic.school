<?php

namespace App\Http\Library;

use Illuminate\Http\JsonResponse;

trait ApiHelpers
{
    protected function isAdmin($user): bool
    {
        if (!empty($user)) {
            return $user->tokenCan('admin');
        }

        return false;
    }

    protected function isManager($user): bool
    {

        if (!empty($user)) {
            return $user->tokenCan('manager');
        }

        return false;
    }

    protected function isCassir($user): bool
    {
        if (!empty($user)) {
            return $user->tokenCan('cassir');
        }

        return false;
    }

    protected function onSuccess($data, string $message = '', int $code = 201): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function onError(int $code = 422, string $message = ''): JsonResponse
    {
        return response()->json([
            'status' => $code,
            'message' => $message,
        ], $code);
    }

    protected function postValidationRules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
        ];
    }

    protected function userValidatedRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}