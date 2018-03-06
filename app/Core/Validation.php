<?php

namespace App\Core;

class Validation
{

    private $_passed = false;
    private $_errors = [];

    public function check($fields = [])
    {
        foreach ($fields as $field => $rules) {
            foreach ($rules as $rule => $rule_value) {

                switch ($rule) {
                    case 'required':
                        if (trim(input($field)) == false && $rule_value == true) {
                            $this->addError($field . ' can\'t be empty.');
                        }
                        break;

                    case 'min':
                        if (strlen(input($field)) < $rule_value) {
                            $this->addError($field . ' minimum ' . $rule_value . ' characters.');
                        }
                        break;
                    
                    case 'max':
                        if (strlen(input($field)) > $rule_value) {
                            $this->addError($field . ' maximum ' . $rule_value . ' characters.');
                        }
                        break;

                    case 'string':
                        if (gettype(input($field)) != 'string' && $rule_value == true) {
                            $this->addError($field . ' should be string.');
                        }
                        break;

                    case 'numeric':
                        if (! is_numeric(input($field)) && $rule_value == true) {
                            $this->addError($field . ' should be numeric.');
                        }
                        break;
                    
                    case 'integer':
                        if (gettype(input($field)) != 'integer' && $rule_value == true) {
                            $this->addError($field . ' should be integer.');
                        }
                        break;

                    case 'boolean':
                        if (gettype(input($field)) != 'boolean' && $rule_value == true) {
                            $this->addError($field . ' should be boolean.');
                        }
                        break;
                    
                    case 'array':
                        if (gettype(input($field)) != 'array' && $rule_value == true) {
                            $this->addError($field . ' should be an array.');
                        }
                        break;
                    
                    case 'email':
                        if (! filter_var(input($field), FILTER_VALIDATE_EMAIL)) {
                            $this->addError($field . ' is not valid.');
                        }
                        break;

                    default:
                        break;
                }

            }
        }

        if (empty($this->_errors)) {
            $this->_passed = true;
        }

        return $this;
    }

    private function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function fails()
    {
        return !$this->_passed;
    }

}