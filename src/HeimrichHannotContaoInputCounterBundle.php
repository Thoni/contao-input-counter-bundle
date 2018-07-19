<?php

namespace HeimrichHannot\InputCounterBundle;

use HeimrichHannot\InputCounterBundle\DependencyInjection\InputCounterExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotContaoInputCounterBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new InputCounterExtension();
    }
}