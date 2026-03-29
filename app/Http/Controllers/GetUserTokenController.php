<?php

namespace App\Http\Controllers;

use App\Services\User\GetUserToken;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class GetUserTokenController extends Controller
{
    private GetUserToken $getUserToken;

    public function __construct(GetUserToken $getUserToken)
    {
        $this->getUserToken = $getUserToken;
    }

    /**
     * @throws GuzzleException
     */
    public function __invoke(Request $request)
    {
        $request->validate(['code' => 'required']);

        return response()->json($this->getUserToken->handle($request->input('code')));
    }
}
