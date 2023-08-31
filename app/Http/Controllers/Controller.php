<?php

namespace App\Http\Controllers;

    use App\vendor\laravel\framework\src\Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use App\vendor\laravel\framework\src\Illuminate\Foundation\Bus\DispatchesJobs;
    use App\vendor\laravel\framework\src\Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Routing\Controller as BaseController;

    class Controller extends BaseController
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    }
