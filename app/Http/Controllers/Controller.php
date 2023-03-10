<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ControllerTraits\StoreFiles;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use App\Http\Controllers\ControllerTraits\StoreFiles;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, StoreFiles , ValidatesRequests;
}
