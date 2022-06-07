<?php
namespace App\Fields\Store;


class Field {
    use ValidationTrait;
    
    protected $name;
    protected $type;

    public static function make($name)
    {
        $class = get_called_class();
        return new $class($name);
    }

    public function beforeSave($callback)
    {
        $this->beforeSaveClouser = $callback;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
}