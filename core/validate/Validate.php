<?php

namespace core\validate;

use core\contracts\Validate as ContractsValidate;

class Validate
{
  protected array $errors = [];
  protected array $data = [];

  public function validate(
    Object $object
  ) {
    $reflection = new \ReflectionClass($object);
    $properties = $reflection->getProperties();
    foreach ($properties as $property) {
      $attributes = $property->getAttributes(
        ContractsValidate::class,
        \ReflectionAttribute::IS_INSTANCEOF
      );
      foreach ($attributes as $attribute) {
        $response = $attribute->newInstance()->validate(
          $property->getName(),
          $property->getValue($object)
        );

        if ($response !== null) {
          $this->errors[$property->getName()] = $response;
        } else {
          $this->data[$property->getName()] = strip_tags($property->getValue($object));
        }
      }
    }
  }

  public function get_errors()
  {
    return $this->errors;
  }

  public function get_data()
  {
    return $this->data;
  }
}
