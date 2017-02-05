<?php

class CallToActionBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('CallToActionBlock.SINGULARNAME', 'Call To Action Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('CallToActionBlock.PLURALNAME', 'Call To Action Blocks');
    }

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

    /**
     * @return mixed
     */
    public function getTitle()
    {
        if ($this->BlockLink()) {
            return $this->BlockLink()->Title;
        }
    }
}