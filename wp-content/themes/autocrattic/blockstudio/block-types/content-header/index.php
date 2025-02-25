<?php
// Path: wp-content/themes/wp2/blockstudio/block-types/content-header/index.php

namespace Autocrattic\Blocks\Types\ContentHeader;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-content-header'
);
echo $inner_blocks;
