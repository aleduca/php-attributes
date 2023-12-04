<?php

namespace app\request;

use core\attributes\Email;
use core\attributes\Required;

readonly class UserCreate
{
  public function __construct(
    #[Required]
    public string $firstName,
    #[Required]
    public string $lastName,
    #[Required, Email]
    public string $email,
    #[Required]
    public string $password,
  ) {
  }
}
