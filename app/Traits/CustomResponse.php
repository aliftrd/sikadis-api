<?php

namespace App\Traits;

use App\Enums\FlashType;

trait CustomResponse
{
    public function resolveForRedirectResponseWith(?string $route, FlashType $type, string $message)
    {
        $destination = !is_null($route) ? to_route($route) : url()->previous();
        return $destination->with('flash', [
            'type' => $type->value,
            'message' => $message,
        ]);
    }

    public function resolveForSuccessResponseWith(string $message, array $data = [], int $code = \Symfony\Component\HttpFoundation\Response::HTTP_OK)
    {
        return response()->json([
            'success' => true,
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public function resolveForFaiedResponseWith(string $message, array $data = [], int $code = \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND)
    {
        return response()->json([
            'success' => false,
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
