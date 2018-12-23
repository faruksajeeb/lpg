<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function now($param = null) {
        date_default_timezone_set('Asia/Dhaka');
        switch ($param) {
            case 'time':
                return date('h:i:s A');
                break;

            case 'date':
                return date('Y-m-d');
                break;

            default:
                return date('Y-m-d H:i:s');
                break;
        }
    }
}
