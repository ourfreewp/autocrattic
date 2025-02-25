<?php
// Path: wp-content/plugins/autocrattic/src/Blocks/Types/site-footer/index.php

namespace Autocrattic\Blocks\Types\SiteFooter;

$inner_blocks = sprintf(
    '<InnerBlocks useBlockProps tag="%s" class="%s"/>',
    'div',
    'wp2-site-footer is-layout-constrained'
);
echo $inner_blocks;
