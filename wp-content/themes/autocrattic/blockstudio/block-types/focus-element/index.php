<?php
// Path: wp-content/themes/wp2/blockstudio/block-types/focus-element/index.php

namespace Autocrattic\Blocks\Types\FocusElement;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-focus-element'
);
echo $inner_blocks;
