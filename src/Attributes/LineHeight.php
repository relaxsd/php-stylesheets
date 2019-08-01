<?php

namespace Relaxsd\Stylesheets\Attributes;

interface LineHeight
{

    const ATTRIBUTE = 'line-height';

    const NORMAL = 'normal';

    // The default line height in most browsers is about 110% to 120%.
    const DEFAULT_VALUE = 1.15;  // Multiply by font size to get line height

}
