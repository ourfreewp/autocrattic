<?php
// Path: wp-content/themes/wp2/blockstudio/block-types/content-main/index.php

namespace Autocrattic\Blocks\Types\ContentMain;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-content-main'
);
echo $inner_blocks;
