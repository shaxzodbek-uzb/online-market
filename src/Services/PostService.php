<?php
namespace OnlineMarket\Services;

use App\Fields\Store\InputField;
use App\Services\Service;
use OnlineMarket\Models\Post;

class PostService extends Service {
    protected $modelClass = Post::class;
    public function getFields()
    {
        
        return [
            InputField::make('name')->required()->max(255),
            InputField::make('slug')->required(),
        ];
    }
}