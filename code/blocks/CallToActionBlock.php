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
        'Link' => 'Link',
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {
            $fields->addFieldToTab(
                'Root.Main',
                LinkField::create('LinkID', 'Link')
            );
        });

        $fields = parent::getCMSFields();

        return $fields;
    }
}