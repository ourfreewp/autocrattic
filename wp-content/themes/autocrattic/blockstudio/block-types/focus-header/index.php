<?php
// Path: wp-content/themes/wp2/blockstudio/block-types/focus-header/index.php

namespace Autocrattic\Blocks\Types\FocusHeader;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-focus-header'
);
echo $inner_blocks;
