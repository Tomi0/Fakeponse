<?php

namespace App\Http\Controllers;

use App\Services\User\GetAuthInfo;
use Illuminate\Http\JsonResponse;

class GetAuthInfoController extends Controller
{
    private GetAuthInfo $getAuthInfo;

    public function __construct(GetAuthInfo $getAuthInfo)
    {
        $this->getAuthInfo = $getAuthInfo;
    }

    public function __invoke(): JsonResponse
    {
        return response()->json($this->getAuthInfo->handle());
    }

}
