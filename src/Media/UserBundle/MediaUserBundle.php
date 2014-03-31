<?php

namespace Media\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MediaUserBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
