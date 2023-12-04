<?php
interface CheckInterface
{
  public function check(
    string $name,
    mixed $value,
  );
}

#[Attribute(
  Attribute::TARGET_PROPERTY
)]
class Str implements CheckInterface
{
  public function check(
    string $name,
    mixed $value
  ) {
    if (!is_string($value)) {
      throw new Exception('Not a string ' . $name);
    }
  }
} {
}

#[Attribute(
  Attribute::TARGET_PROPERTY
)]
class Integer implements CheckInterface
{
  public function check(
    string $name,
    mixed $value
  ) {
    if (!is_int($value)) {
      throw new Exception('Not an integer ' . $name);
    }
  }
} {
}

class A
{
  #[Str]
  public $name;
  #[Integer]
  public $age;

  public function check()
  {
    $reflection = new ReflectionClass($this);
    $properties = $reflection->getProperties();
    foreach ($properties as $property) {
      $attributes = $property->getAttributes(
        CheckInterface::class,
        ReflectionAttribute::IS_INSTANCEOF
      );
      foreach ($attributes as $attribute) {
        $attribute->newInstance()->check(
          $property->getName(),
          $property->getValue($this)
        );
      }
    }
  }
}


$a = new A;
$a->name = 'John';
$a->age = '20';
$a->check();
