<?php
    $rules = [
        'Kundennummer' => [ 'required', 'kdnr_korr' => function($input) {
            if (preg_match("`KdNr-`", $input) && 	preg_match("`[0-9]{6}`", $input)) // [0-5]{5,6}
               return true; 
           return false; 
        }
    ],
        'Vorname' => [ 'required', 'alpha'],
        'Nachname' => [ 'required', 'alpha'],
        'Adresse' => [ 'required'],
        'PLZ' => [ 'required', 'numeric', 'exact_length(4)'],
        'Ort' => ['required', 'alpha' ],
        'Telefon' => [ 'required', 'numeric'],
        'Email' => [ 'required', 'email']
    ];
     $validation_result = SimpleValidator\Validator::validate($_POST, $rules);
        if ($validation_result->isSuccess() == true) {
       } else {
            // echo "validation not ok";
            $errors=($validation_result->getErrors('de'));
            foreach ($errors AS $error) {
                $errorMsg .= "<p class='error'>$error</p>"; 
            }   
        }
