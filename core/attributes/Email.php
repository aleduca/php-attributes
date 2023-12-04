<?php

namespace core\attributes;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Email implements \core\contracts\Validate
{
  public function validate(
    string $index,
    mixed $value
  ) {
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
      return "{$index} is not a valid email";
    }
  }
}
