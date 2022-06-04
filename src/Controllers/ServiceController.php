<?php

namespace OnlineMarket\Controllers;

use App\Http\Controllers\Controller;

// api route -> controller -> service -> controller
class ServiceController extends Controller
{
    protected $service;
    protected $serviceClass;
    protected $storeRequestClass;
    protected $updateRequestClass;
    
    public function __construct() {
        $this->service = app($this->serviceClass);
    }
    public function index()
    {
        return $this->service->index();
    }
    public function show($resourceName, $id = null)
    {
        if(is_null($id)){
            $id = $resourceName;
        }
        $item = $this->service->find($id);
        return $item;
    }

    // store
    public function store()
    {        
        $item = $this->service->store(request());
        
        // response
        return response()->json($item);
    }

    // update
    public function update($resourceName, $id = null)
    {
        if(is_null($id)){
            $id = $resourceName;
        }
        $item = $this->service->update($id, request());
        
        return response()->json($item);
    }

    // destroy
    public function destroy($resourceName, $id = null)
    {
        if(is_null($id)){
            $id = $resourceName;
        }
        $this->service->destroy($id);

        return response()->json([
            'success' => true,
            'id' => $id,
        ]);
    }
}
