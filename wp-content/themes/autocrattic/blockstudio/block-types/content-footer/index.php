<?php
// Path: wp-content/themes/wp2/blockstudio/block-types/content-footer/index.php

namespace Autocrattic\Blocks\Types\ContentFooter;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-content-footer'
);
echo $inner_blocks;
