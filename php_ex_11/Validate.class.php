<?php
class Validate {

    private $errors = array();
    private $source = array();
    private $rules = array();
    private $result = array();

    public function __construct($source){
        $this->source = $source;
    }

    public function addRules($rules){
        $this->rules = array_merge($this->rules, $rules);
    }

    public function addRule($element, $type, $min=0, $max=0){
        $this->rules[$element] = array('type'=>$type, 'min'=>$min, 'max'=>$max);
        return $this;
    }

    public function getError(){
        return $this->errors;
    }

    public function run(){
        foreach($this->rules as $element=>$value){
            switch ($value['type']){
                case 'string':
                    $this->validateString($element);
                    break;
                case 'password':
                    $this->validatePassword($element);
                    break;
                case 'confirm_pass':
                    $this->validateConfirmPassword($element);
                    break;
                case 'url':
                    $this->validateUrl($element);
                    break;
                case 'email':
                    $this->validateEmail($element);
                    break;
                case 'captcha':
                    $this->validateCaptcha($element);
                    break;
            }
        }
    }

    private function validateString($element, $min=0, $max=0){
       $length = strlen($this->source[$element]);
       if($length < $min){
           $this->errors[$element] = ucwords($element)." is too short";
       } elseif($length>$max){
           $this->errors[$element] = ucwords($element). " is too long";
       }elseif(is_string($this->source[$element])){
           $this->errors[$element]= ucwords($element). " is an invalid string";
       }
    }

    private function validatePassword($element, $min=0, $max=0){
        $pass = $this->source[$element];

        $uppercase = preg_match('@[A-Z]@',$pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number = preg_match('@[0-9]@', $pass);
        $nonword = preg_match('@[\W]@', $pass);

        if(!$uppercase || !$lowercase || !$number || !$nonword){
            $this->errors[$element] = "Password needs to have at least 1 lower case, 1 upper case, 1 number and 1 special character";
        } elseif(!strlen($pass)> $min || !strlen($pass)< $max){
            $this->errors[$element] = "Password needs to be between $min to $max characters";
        }
    }

    private function validateConfirmPassword($element){
        if($this->source[$element] != $this->source['pass']){
            $this->errors[$element] = "Confirm password must be the same as password";
        }
    }

    private function validateEmail($element){
        if(!filter_var($this->source[$element], FILTER_VALIDATE_EMAIL)){
            $this->errors[$element] = ucwords($element)." is invalid";
        }
    }

    private function validateURL($element){
        if(!filter_var($this->source[$element], FILTER_VALIDATE_URL)){
            $this->errors[$element] = ucwords($element)." is invalid";
        }
    }

    private function validateCaptcha($element){
        require_once 'securimage/securimage.php';
	    $securimage = new Securimage();
        if($securimage->check($this->source[$element])== false){
            $this->errors[$element] = ucwords($element)." is wrong";
        }
    }
}
?>