<?php

namespace Relaxsd\Stylesheets\Attributes;

interface FontSize
{

    const ATTRIBUTE = 'font-size';

    // TODO: 'DEFAULT' would be better, but is only allowed in PHP >= 7
    // See: https://websemantics.uk/articles/font-size-conversion/
    const DEFAULT_VALUE = 12; // 12pt, 16px, 1em, 100%, medium

}
