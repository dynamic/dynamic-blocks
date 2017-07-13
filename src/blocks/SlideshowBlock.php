<?php

namespace Dynamic\DynamicBlocks\Block;

use SheaDawson\Blocks\Controllers\BlockController;
use SheaDawson\Blocks\Model\Block;

class SlideshowBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('SlideshowBlock.SINGULARNAME', 'Slideshow Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('SlideshowBlock.PLURALNAME', 'Slideshow Blocks');
    }

    /**
     * @var string
     */
    private static $table_name = 'SlideshowBlock';
}