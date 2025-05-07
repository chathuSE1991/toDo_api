<?php

namespace App\Http\Traits;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

/**
 * Trait ResponseTrait.
 */
trait ResponseTrait 
{
	/**
	 * Data Response
	 * @param $data
	 * @return JsonResponse
	 */
	public function dataResponse($data): JsonResponse
	{
		return response()->json($data, Response::HTTP_OK);
	}

	/**
	 * Success Response
	 * @param string $message
	 * @param int $code
	 * @return JsonResponse
	 */
	public function successResponse(string $message, $code = Response::HTTP_OK): JsonResponse
	{
		return response()->json(['success' => $message, 'code' => $code], $code);
	}

	/**
	 * Error Response
	 * @param $message
	 * @param int $code
	 * @return JsonResponse
	 *
	 */
	public function errorResponse($message, $code = Response::HTTP_BAD_REQUEST): JsonResponse
	{
		return response()->json(['error' => $message, 'code' => $code], $code);
	}
}
