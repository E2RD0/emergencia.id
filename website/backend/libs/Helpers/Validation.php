<?php
namespace Helpers;

class Validation
{
    public static function trimForm($fields)
    {
        foreach ($fields as $index => $value) {
            $value = trim($value);
            $fields[$index] = $value;
        }
        return $fields;
    }
}
