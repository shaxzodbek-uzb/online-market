<?php
namespace OnlineMarket\Fields\Store;

class NumberField extends Field
{
    public function __construct($name, $type = 'number')
    {
        $this->type = $type;
        $this->name = $name;
    }

    public function fill($item, $data)
    {
        $value = $data[$this->name];
        // preccess
        $item->{$this->name} = $value;
    }
}