<?php

namespace Dynamic\DynamicBlocks\Block;

use SheaDawson\Blocks\Model\Block;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;

/**
 * Class EmbedCodeBlock
 */
class EmbedCodeBlock extends Block
{

    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('EmbedCodeBlock.SINGULARNAME', 'Embed Code Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('EmbedCodeBlock.PLURALNAME', 'Embed Code Blocks');
    }
    /**
     * @var string
     */
    private static $description = 'Block providing ability to embed code (generally javascript)';

    /**
     * @var array
     */
    private static $db = [
        'Code' => 'HTMLText',
    ];

    /**
     * @var string
     */
    private static $table_name = 'EmbedCodeBlock';

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->replaceField(
            'Code',
            TextareaField::create('Code')
                ->setTitle('Embed Code')
        );

        return $fields;
    }

}