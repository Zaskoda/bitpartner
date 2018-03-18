<?php

namespace App\Http\Controllers;

use App\Traits\LastUpdate;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use LastUpdate;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
