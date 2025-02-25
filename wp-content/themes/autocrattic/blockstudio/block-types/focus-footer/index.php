<?php
// Path: wp-content/themes/wp2/blockstudio/block-types/focus-footer/index.php

namespace Autocrattic\Blocks\Types\FocusFooter;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-focus-footer'
);
echo $inner_blocks;
