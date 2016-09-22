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
    private static $db = array(
        'Video' => 'Varchar(255)',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab(
            'Root.Main',
            YouTubeField::create('Video')
                ->setTitle('Video link')
                ->setRightTitle('Paste the link from the address bar in your browser while viewing the video on YouTube')
        );

        return $fields;
    }
}
