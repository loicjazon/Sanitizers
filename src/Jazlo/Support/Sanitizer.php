<?php

namespace Jazlo\Support;

/**
 * Class Sanitizer
 * @package Jazlo\Support
 */
abstract class Sanitizer
{
    /**
     * @param array      $data
     * @param array|null $rules
     *
     * @return array
     */
    public function sanitize(array $data, array $rules = null)
    {
        $rules = $rules ?: $this->getRules();

        foreach ($rules as $field => $sanitizers) {
            if ( ! isset($data[$field])) {
                continue;
            }

            $data[$field] = $this->applySanitizersTo($data[$field], $sanitizers);
        }

        return $data;
    }

    /**
     * @param $sanitizers
     *
     * @return array
     */
    protected function splitSanitizers($sanitizers)
    {
        return is_array($sanitizers) ? $sanitizers : explode('|', $sanitizers);
    }

    /**
     * @param $value
     * @param $sanitizers
     *
     * @return mixed
     */
    protected function applySanitizersTo($value, $sanitizers)
    {
        foreach ($this->splitSanitizers($sanitizers) as $sanitizer) {
            $method = 'sanitize'.ucwords($sanitizer);

            $value = method_exists($this, $method)
                ? $value = call_user_func([$this, $method], $value)
                : $value = call_user_func($sanitizer, $value);
        }

        return $value;
    }

    /**
     * @return mixed
     */
    public function getRules()
    {
        return $this->rules;
    }

}
