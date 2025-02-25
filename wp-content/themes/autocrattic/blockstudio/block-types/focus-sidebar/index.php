<?php
// Path: wp-content/themes/wp2/blockstudio/block-types/focus-sidebar/index.php

namespace Autocrattic\Blocks\Types\FocusSidebar;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-focus-sidebar'
);
echo $inner_blocks;
