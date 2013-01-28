<?php

namespace Oh\ColorPickerTypeBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class HexColorValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint)
    {
        /**
         * Valid:
         *  
         * #ffffff
         * #ddd
         * ffffff
         * 444
         * 
         * Invalid:  
         *       
         * #wsfsga
         * #9999
         * ggg
         * gggggg
         */
        
        if(is_null($constraint->requireHash))
        {
            $hashReg = '#{0,1}';
        }else if ($constraint->requireHash === true)
        {
            $hashReg = '#';
        }else if ($constraint->requireHash === false)
        {
            $hashReg = '';
        }else {
            throw new \Exception('The requireHash option value is invalid');
        }
        
        if (!preg_match("/^$hashReg([0-9a-fA-F]{6}|[0-9a-fA-F]{3})$/", $value)) {
            $this->setMessage($constraint->message, array('%color%' => $value));
            return false;
        }

        return true;
    }
}