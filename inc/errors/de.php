<?php
/**
 * :attribute => input name
 * :params => rule parameters ( eg: :params(0) = 10 of max_length(10) )
 */
return array(
    'required' => ':attribute ist ein Pflichtfeld!',
    'integer' => ':attribute darf nur Zahlen enthalten!',
    'float' => ':attribute field must be a float',
    'numeric' => ':attribute darf nur Zahlen enthalten!',
    'email' => 'Bitte eine gültige Email eintragen!',
    'alpha' => ':attribute darf nur Buchstaben enthalten!',
    'alpha_numeric' => ':attribute field must be alphanumeric',
    'ip' => ':attribute must contain a valid IP',
    'url' => ':attribute must contain a valid URL',
    'max_length' => ':attribute darf maximal :params(0) Zeichen lang sein!',
    'min_length' => ':attribute muss mindestens :params(0) Zeichen lang sein!',
    'exact_length' => ':attribute muss :params(0) Zeichen lang sein!',
    'equals' => ':attribute field should be same as :params(0)',
    'kdnr_korr' => ':attribute muss im Format KdNr-000000 eingegeben werden'
);
