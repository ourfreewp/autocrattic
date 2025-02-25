<?php
// Path: wp-content/plugins/autocrattic/src/Blocks/Types/navbar/index.php

namespace Autocrattic\Blocks\Types\Navbar;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-navbar is-layout-constrained'
);
echo $inner_blocks;
