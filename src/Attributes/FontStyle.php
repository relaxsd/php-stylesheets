<?php

namespace Relaxsd\Stylesheets\Attributes;

interface FontStyle
{
    const ATTRIBUTE = 'font-style';

    const NORMAL = '';
    const BOLD = 'bold';
    const ITALIC = 'italic';
    const UNDERLINE = 'underline';

    const BOLD_ITALIC = 'bold,italic';
    const BOLD_UNDERLINE = 'bold,underline';
    const ITALIC_UNDERLINE = 'italic,underline';
    const BOLD_ITALIC_UNDERLINE = 'bold,italic,underline';

}
