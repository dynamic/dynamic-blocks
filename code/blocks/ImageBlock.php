<?php

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
        'Image' => 'Image',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->dataFieldByName('Title')->setDescription('Internal reference only');
        $fields->dataFieldByName('Image')->setFolderName('Uploads/ImageBlocks');

        return $fields;
    }
}