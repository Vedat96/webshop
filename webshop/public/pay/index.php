<?php 
require '../../boot.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $errors = [];

        $variables = [
            'first_name' => ['required', 'name', 'min:2', 'max:100'],
            'suffix_name' => ['name', 'max:25'],
            'last_name' => ['required', 'name', 'min:2', 'max:100'],
            'country' => ['required', 'name', 'min:2', 'max:6'],
            'city' => ['required', 'name', 'min:2', 'max:100'],
            'street' => ['required', 'name', 'min:2', 'max:100'],
            'street_number' => ['required', 'number', 'min:1', 'max:5'],
            'street_suffix' => ['max:100'],
            'zipcode' => ['required', 'zipcode'],
            'email' => ['required', 'email', 'min:6', 'max:7'],
            'password' => ['required', 'min:8', 'confirm'],
        ];

        foreach($variables as $key => $checks) {

            if(in_array('required', $checks)) {
                if($error = required($_POST[$key], $key, $checks)) {
                    if(array_key_exists($key, $errors)) {
                        array_push($errors[$key], $error);
                    }
                    else {
                        $errors[$key] = [$error];
                    }
                }
            }

            if(in_array('name', $checks)) {

            }

            if(in_array('number', $checks)) {

            }
        }

        dd($errors);
    }

    function required($value, $key, $variable)
    {
        if(! $value) {
            // return false;
            return $key.' is niet ingevuld';
        }
    }
 ?>