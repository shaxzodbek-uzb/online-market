<?php
namespace OnlineMarket\Fields\Store;

class InputField extends Field
{
    public function __construct($name, $type = 'text')
    {
        $this->type = $type;
        $this->name = $name;
    }

    public function fill($item, $data)
    {
        $value = $data[$this->name];
        // preccess
        $beforeSave = $this->beforeSaveClouser;
        $value = $beforeSave($value);
        $item->{$this->name} = $value;
    }
}