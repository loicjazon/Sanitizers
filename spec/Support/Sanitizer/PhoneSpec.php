<?php

namespace spec\Jazlo\Support\Sanitizer;

use Jazlo\Support\Sanitizer;
use PhpSpec\ObjectBehavior;

class PhoneSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Sanitizer::class);
    }

    function it_allows_for_US_phone_sanitization()
    {
        $this->sanitize(
            ['phone' => '555-555-5555']
        )->shouldReturn(['phone' => '5555555555']);
    }
}
