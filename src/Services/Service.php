<?php
namespace OnlineMarket\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Service {
    protected $model;
    protected $modelClass;

    public function __construct() {
        $this->model = new $this->modelClass;
    }

    public function index()
    {
        $items = $this->model::all();
        return $items;
    }

    public function find($id) {
        $item = $this->model->find($id);
        return $item;
    }

    public function store(Request $request)
    {
        $fields = $this->getFields();
        $rules = [];
        foreach ($fields as $field) {
            $rules[$field->getName()] = $field->getRules();
        }
        // validation
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors(),
            ];
        }
        // Retrieve the validated input...
        $data = $validator->validated();
        // service store
        // $item = $this->model->create($data);
        $item = $this->model;
        foreach ($fields as $field) {
            $field->fill($item, $data);
        }
        $item->save();
        return $item;
    }

    public function update($id, Request $request)
    {
        
        $fields = $this->getFields();
        $rules = [];
        foreach ($fields as $field) {
            $rules[$field->getName()] = $field->getRules();
        }
        // validation
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors(),
            ];
        }
        // Retrieve the validated input...
        $data = $validator->validated();
        $item = $this->find($id);
        foreach ($fields as $field) {
            $field->fill($item, $data);
        }
        // service update
        $item->update();
        return $item;
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();
    }

    public function getFields()
    {
        return [];
    }
}