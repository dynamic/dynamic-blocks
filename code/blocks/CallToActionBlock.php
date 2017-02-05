<?php

class CallToActionBlock extends Block
{
    /**
     * @var string
     */
    private static $singular_name = 'Call To Action Block';

    /**
     * @var string
     */
    private static $plural_name = 'Call To Action Blocks';

    /**
     * @var array
     */
    private static $has_one = [
        'BlockLink' => 'Link',
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {
            $fields->addFieldToTab(
                'Root.Main',
                LinkField::create('BlockLinkID', 'Link')
            );
        });

        $fields = parent::getCMSFields();

        $fields->removeByName([
            'Title',
        ]);

        return $fields;
    }

    public function getTitle()
    {
        if ($this->BlockLink()) {
            return $this->BlockLink()->Title;
        }
    }
}