<?php

namespace App\Http\base\controller;

use App\Http\base\service\BaseApiService;
use App\Http\base\response\HTTPCode;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as Controller;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $service;
    protected $actions = [];


    /**
     * BaseController Constructor
     *
     * @param BaseApiService $service
     * @param $actions
     */
    public function __construct(BaseApiService $service, $actions)
    {
        $this->service = $service;
        $this->actions = $actions;
    }

    public function noResponse(): JsonResponse
    {
        return response()->json([
                "status" => HTTPCode::InternalError,
                'message' => trans('No data')
            ], HTTPCode::InternalError);
    }
}
