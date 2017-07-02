# Sanitizers

```php
<?php
class TestSanitizer extends \Jazlo\Support\Sanitizer
{
    protected $rules = [
        'name'  => ['trim', 'ucwords'],
        'phone' => ['phone'],
    ];

    public function sanitizePhone($value)
    {
        return str_replace('-', '', $value);
    }
}
?>
```
```php
<?php
$sanitizer = new \spec\Jazlo\Support\TestSanitizer();
echo $sanitizer->sanitize(
    ['name' => '  john'],
    ['name' => 'ucword']
);
?>
```

```
John
```