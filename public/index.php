<?php

require '../vendor/autoload.php';


#[Attribute(\Attribute::TARGET_CLASS)]
class Logger
{
  public function __construct(
    string $message
  ) {
    dd($message);
  }
}


$logger = new #[Logger('logger')] class
{
  public function log(string $message)
  {
    $reflection = new ReflectionClass($this);
    $attributes = $reflection->getAttributes(
      Logger::class,
      ReflectionAttribute::IS_INSTANCEOF
    );
    $instance = $attributes[0]->newInstance();
    dd($instance);
  }
};

$logger->log('My message');
