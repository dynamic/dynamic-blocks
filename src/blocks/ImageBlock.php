<?php

namespace Dynamic\DynamicBlocks\Block;

use SheaDawson\Blocks\Model\Block;
use SilverStripe\Assets\Image;

class ImageBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('ImageBlock.SINGULARNAME', 'Image Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('ImageBlock.PLURALNAME', 'Image Blocks');
    }

    /**
     * @var array
     */
    private static $has_one = array(
        'Image' => Image::class,
    );

    /**
     * @var string
     */
    private static $table_name = 'ImageBlock';

    /**
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->dataFieldByName('Title')->setDescription('Internal reference only');
        $fields->dataFieldByName('Image')->setFolderName('Uploads/ImageBlocks');

        return $fields;
    }
}