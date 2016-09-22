<?php

class DynamicBlocksSlideImageDataExtension extends DataExtension
{
    /**
     * @var array
     */
    private static $has_one = array(
        'SlideshowBlock' => 'SlideshowBlock',
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