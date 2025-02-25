<?php
// Path: wp-content/themes/wp2/blockstudio/block-types/layout-main/index.php

namespace Autocrattic\Blocks\Types\LayoutMain;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-layout-main'
);
echo $inner_blocks;
