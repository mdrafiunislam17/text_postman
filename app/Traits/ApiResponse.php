<?php

namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponse
{
    // =============================
    // HTTP Status Codes
    // =============================
    protected int $HTTP_OK                    = 200;
    protected int $HTTP_CREATED               = 201;
    protected int $HTTP_ACCEPTED              = 202;
    protected int $HTTP_NO_CONTENT            = 204;

    protected int $HTTP_BAD_REQUEST           = 400;
    protected int $HTTP_UNAUTHORIZED          = 401;
    protected int $HTTP_FORBIDDEN             = 403;
    protected int $HTTP_NOT_FOUND             = 404;
    protected int $HTTP_METHOD_NOT_ALLOWED    = 405;
    protected int $HTTP_CONFLICT              = 409;
    protected int $HTTP_UNPROCESSABLE_ENTITY  = 422;

    protected int $HTTP_INTERNAL_ERROR        = 500;
    protected int $HTTP_NOT_IMPLEMENTED       = 501;
    protected int $HTTP_SERVICE_UNAVAILABLE   = 503;

    // =============================
    // Response Helpers
    // =============================

    /**
     * Success response
     */
    protected function successResponse($data = [], string $message = 'Success', int $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    /**
     * Error response
     */
    protected function errorResponse(string $message = 'Something went wrong', int $code = 400, $errors = [])
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $code);
    }

    /**
     * Validation error response
     */
    protected function validationErrorResponse($errors, string $message = 'Validation Failed')
    {
        return $this->errorResponse($message, $this->HTTP_UNPROCESSABLE_ENTITY, $errors);
    }

    /**
     * Paginated success response
     */
    protected function paginatedResponse(LengthAwarePaginator $paginator, string $message = 'Success')
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $paginator->items(),
            'meta'    => [
                'current_page' => $paginator->currentPage(),
                'per_page'     => $paginator->perPage(),
                'total'        => $paginator->total(),
                'last_page'    => $paginator->lastPage(),
            ],
            'links'   => [
                'first' => $paginator->url(1),
                'last'  => $paginator->url($paginator->lastPage()),
                'prev'  => $paginator->previousPageUrl(),
                'next'  => $paginator->nextPageUrl(),
            ]
        ], $this->HTTP_OK);
    }
}
