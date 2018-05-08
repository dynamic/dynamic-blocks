<?php

namespace Dynamic\DynamicBlocks\Block;

use SheaDawson\Blocks\Model\Block;

class ChildPagesBlock extends Block
{
    /**
     * @var string
     */
    private static $singular_name = 'Child Pages Block';

    /**
     * @var string
     */
    private static $plural_name = 'Child Pages Blocks';

    /**
     * @var string
     */
    private static $table_name = 'ChildPagesBlock';
}