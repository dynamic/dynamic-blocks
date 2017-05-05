<?php

class EmbedBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('AccordionBlock.SINGULARNAME', 'oEmbed Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('AccordionBlock.PLURALNAME', 'oEmbed Blocks');
    }

    /**
     * @var array
     */
    private static $has_one = [
        'EmbeddedObject' => 'EmbeddedObject',
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields(){
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'EmbeddedObjectID',
        ]);

        $fields->addFieldToTab(
            'Root.Embed',
            EmbeddedObjectField::create('EmbeddedObject', 'Content from oEmbed URL', $this->EmbeddedObject())
        );

        return $fields;
    }
}