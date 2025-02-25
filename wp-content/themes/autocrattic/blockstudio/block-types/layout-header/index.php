<?php
// Path: wp-content/themes/wp2/blockstudio/block-types/layout-header/index.php

namespace Autocrattic\Blocks\Types\LayoutHeader;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-layout-header'
);
echo $inner_blocks;
