<?php
// Path: wp-content/themes/autocrattic/blockstudio/block-types/root-layout/index.php

namespace Autocrattic\Blocks\Types\RootLayout;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-root'
);
echo $inner_blocks;