<?php

class VideoBlock extends Block
{
    /**
     * @var string
     */
    private static $singular_name = 'Video Block';

    /**
     * @var string
     */
    private static $plural_name = 'Video Blocks';

    /**
     * @var array
     */
    private static $has_one = array(
        'Video' => 'SilverStripeYouTubeVideo',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $source = function(){
            return SilverStripeYouTubeVideo::get()->map()->toArray();
        };


        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create('VideoID')
                ->setTitle('Video')
                ->setSource($source())
                ->setEmptyString('')
                ->useAddNew('SilverStripeYouTubeVideo', $source)
        );

        return $fields;
    }
}
