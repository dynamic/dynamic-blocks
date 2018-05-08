<?php

namespace Dynamic\DynamicBlocks\ORM;

use Dynamic\DynamicBlocks\Block\SlideshowBlock;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class DynamicBlocksSlideImageDataExtension extends DataExtension
{
    /**
     * @var array
     */
    private static $has_one = array(
        'SlideshowBlock' => SlideshowBlock::class,
    );

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName(array(
            'SlideshowBlockID',
        ));
    }
}