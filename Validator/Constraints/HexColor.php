<?php

namespace Oh\ColorPickerTypeBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class HexColor extends Constraint
{
    public $message = 'The color supplied (%color%) is invalid.';
    /**
     * Takes one of these values:
     * null = The hash isn't checked
     * true = The hash is required
     * false = The hash isn't allowed
     * @var type 
     */
    public $requireHash = null;
}