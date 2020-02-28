<?php


namespace App\Common;


/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25-Oct-18
 * Time: 11:38 AM
 */



use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\UnauthorizedException;


abstract class CommandValidator
{

    abstract function rules($command): array;


    protected function validateRules($command)
    {
        $rules = $this->rules($command);
        $messages = $this->messages();
        $attributes = $this->attributes();

        $validator = Validator::make((array)$command, $rules, $messages, $attributes);
        $validator->validate();
    }




    function validate($command)
    {
        $this->validateRules($command);
    }

    function messages()
    {
        return [];
    }

    public function attributes()
    {
        return [];
    }
}
