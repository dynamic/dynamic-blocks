<?php

namespace Dynamic\DynamicBlocks\Block;

use SheaDawson\Blocks\Model\Block;

class EmbedBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('EmbedBlock.SINGULARNAME', 'oEmbed Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('EmbedBlock.PLURALNAME', 'oEmbed Blocks');
    }

    /**
     * @var array
     */
    private static $has_one = [
        //'EmbeddedObject' => 'EmbeddedObject', // todo readd once Linkable is SS4 compatible
    ];

    /**
     * @var string
     */
    private static $table_name = 'EmbedBlock';

    /**
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields(){
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'EmbeddedObjectID',
        ]);

        /* // todo readd once Linkable is SS4 compatible
        $fields->addFieldToTab(
            'Root.Embed',
            EmbeddedObjectField::create('EmbeddedObject', 'Content from oEmbed URL', $this->EmbeddedObject())
        );
        */

        return $fields;
    }
}