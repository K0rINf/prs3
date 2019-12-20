<?php

namespace App\Parser\Modifier;

use App\Parser\Context;

interface ModifierInterface {
    public function modify(Context $context);
}
