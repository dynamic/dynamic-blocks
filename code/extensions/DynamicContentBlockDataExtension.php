<?php

class DynamicContentBlockDataExtension extends DataExtension
{
    /**
     * @var array
     */
    private static $db = array(
        'SubTitle' => 'Varchar(255)',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Image' => 'Image',
        'BlockLink' => 'Link',
    );

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $image = ImageUploadField::create('Image')
            ->setFolderName('Uploads/Blocks/Content');
        $fields->insertBefore($image, 'Content');

        $fields->addFieldToTab(
            'Root.Main',
            LinkField::create('BlockLinkID', 'Link'),
            'Image'
        );

        $fields->insertAfter(TextField::create('SubTitle'), 'Title');
    }

}