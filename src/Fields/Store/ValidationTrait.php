<?php

namespace App\Fields\Store;

trait ValidationTrait {
    
    // validations
    protected $isRequired = false;
    protected $isUnique = false;
    protected $isEmail = false;
    protected $isNumeric = false;
    protected $isInteger = false;
    protected $isDate = false;
    protected $isDateTime = false;
    protected $isTime = false;
    protected $isBoolean = false;
    protected $isIn = false;
    protected $isNotIn = false;
    protected $isBetween = false;
    protected $isMax = false;
    protected $beforeSaveClouser;

    public function getRules()
    {
        $rules = [];
        if($this->isRequired) {
            $rules[] = 'required';
        }

        //numeric
        if($this->isNumeric) {
            $rules[] = 'numeric';
        }

        //max
        if($this->isMax) {
            $rules[] = 'max:'.$this->isMax;
        }
        return $rules;
    }

    public function required()
    {
        $this->isRequired = true;
        return $this;
    }
    public function numeric(){
        $this->isNumeric = true;
        return $this;
    }

    public function max(int $max)
    {
        $this->isMax = $max;
        return $this;
    }
}