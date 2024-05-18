<?php

/**
 * Form Validation
 */
class DForm
{
    public $currentValue;
    public $values = array();
    public $errors = array();
    public function __construct()
    {
    }
    public function post($key)
    {
        $this->values[$key] = trim($_POST[$key]);
        $this->currentValue = $key;
        return $this;
    }
    public function isEmpty()
    {
        if (empty($this->values[$this->currentValue]) or $this->values[$this->currentValue] == 0) {
            $this->errors[$this->currentValue]['empty'] = "Field Must not be Empty";
        }
        return $this;
    }
    public function isCatEmpty()
    {
        if ($this->values[$this->currentValue] == 0) {
            $this->errors[$this->currentValue]['empty'] = "Field Must not be Empty";
        }
        return $this;
    }
    public function length($min = 0, $max)
    {
        if (strlen($this->values[$this->currentValue]) < $min or strlen($this->values[$this->currentValue]) > $max) {
            $this->errors[$this->currentValue]['length'] = "Should Min" . $min . " And Max " . $max . " Characters";
        }
        return $this;
    }
    public function submit()
    {
        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }
}
