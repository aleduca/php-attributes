<?php

namespace core\contracts;

interface Validate
{
  public function validate(
    string $index,
    mixed $value
  );
}
