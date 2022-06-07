<?php

namespace OnlineMarket\Controllers\Front;

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
        $items = $this->service->index();
        return view("online-market::products.index", compact('items'));
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
        return redirect()->route('front.resource.index', 'products');
    }

    public function create()
    {
        return view("online-market::products.create");
    }

    public function edit($resourceName, $id)
    {
        
        if(is_null($id)){
            $id = $resourceName;
        }
        $item = $this->service->find($id);
        return view("online-market::products.edit", compact('item'));
    }
    // update
    public function update($resourceName, $id = null)
    {
        if(is_null($id)){
            $id = $resourceName;
        }
        $item = $this->service->update($id, request());
        
        return redirect()->route('front.resource.index', 'products');
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
