<?php
namespace OnlineMarket\Services;

use OnlineMarket\Fields\Store\InputField;
use OnlineMarket\Fields\Store\NumberField;
use OnlineMarket\Services\Service;
use Illuminate\Support\Str;
use OnlineMarket\Models\Product;

class ProductService extends Service {
    protected $modelClass = Product::class;
    public function getFields()
    {
        return [
            InputField::make('name')->required()->beforeSave(fn($value) => Str::upper($value)),
            NumberField::make('price')->numeric()->required(),
        ];
    }
}