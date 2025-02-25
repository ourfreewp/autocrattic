<?php
// Path: wp-content/themes/wp2/blockstudio/block-types/layout-footer/index.php

namespace Autocrattic\Blocks\Types\LayoutFooter;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-layout-footer'
);
echo $inner_blocks;
