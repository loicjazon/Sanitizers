<?php

namespace Jazlo\Support\Sanitizer;

use Jazlo\Support\Sanitizer;

class Phone extends Sanitizer
{
    protected $rules = [
        'phone' => 'phone',
    ];

    public function sanitizePhone($value)
    {
        return str_replace('-', '', $value);
    }
    
}
