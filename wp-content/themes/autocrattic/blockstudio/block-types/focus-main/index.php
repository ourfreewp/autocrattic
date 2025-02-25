<?php
// Path: wp-content/themes/wp2/blockstudio/block-types/focus-main/index.php

namespace Autocrattic\Blocks\Types\FocusMain;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-focus-main'
);
echo $inner_blocks;
