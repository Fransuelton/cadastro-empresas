<?php

use Illuminate\Validation\ValidationException;

function render($request, Throwable $exception)
{
    if ($exception instanceof ValidationException) {
        return response()->json([
            'message' => 'Erro de validação',
            'errors' => $exception->errors(),
        ], 422);
    }

    return parent::render($request, $exception);
}
