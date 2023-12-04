<?php

namespace core\attributes;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Required implements \core\contracts\Validate
{
  public function validate(
    string $index,
    mixed $value
  ) {
    if (empty($value)) {
      return "{$index} is required";
    }
  }
}
