<?php

namespace mergimuka\AHVValidator;

class AHVValidator
{
    /**
     * validator function, it accepts either 13 digits string without (.) or 16 digits string with (.)
     *
     * @param [string] $ahv
     * @return object
     */
    public static function check($ahv) {
        //santitize string
        $ssnNumbers = preg_replace("/[^0-9]/", "", $ahv);

        $ssnNumberLength = strlen($ssnNumbers);

        if($ssnNumberLength > 13 || $ssnNumberLength < 13) {
            return response()->json([
                'valid' => false ,
                'length' => $ssnNumberLength,
                'description' => "Given AHV length is " . ($ssnNumberLength > 13 ? 'greater than 13 digits' : 'less than 13 digits')
            ]);
        }

        //convert string of ahv to array
        $ahv_array = str_split($ssnNumbers, 1);

        $sum = 0;
        for ($i = 0; $i < $ssnNumberLength - 1; $i++) {
            if ($i % 2 == 1) {
                $sum = $sum + ($ahv_array[$i] * 3);
            } else {
                $sum = $sum + $ahv_array[$i];
            }
        }
        //checking if sum of number ends with 0, if so check number will always be 0
        // else it will get 10 - ($sum % 10) 
        if ($sum % 10 === 0) {
            $checkNumber = 0;
        } else {
            $checkNumber = 10 - ($sum % 10);
        }
        
        if ($checkNumber === (integer)$ahv_array[12]) {
            return response()->json([
                'valid' => true ,
                'length' => $ssnNumberLength,
                'description' => 'AHV number is correct.'
            ]);
        }
        return response()->json([
            'valid' => false ,
            'length' => $ssnNumberLength,
            'description' => 'AHV number is not correct!'
        ]);
        }
}