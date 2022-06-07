<?php

namespace OnlineMarket\Controllers\Front;

use Illuminate\Support\Str;

class ResourceController extends ServiceController
{
    public function __construct() {
        if(request()->route()){
            $resourceName = request()->route()->parameter('resource');
            $resourceName = ucfirst($resourceName);
            $resourceName = Str::singular($resourceName);
            $this->service = app("OnlineMarket\\Services\\" . $resourceName . 'Service');
        }
    }
}
