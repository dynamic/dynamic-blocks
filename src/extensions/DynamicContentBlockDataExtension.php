<?php

namespace Dynamic\DynamicBlocks\ORM;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

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
        'Image' => Image::class,
        //'BlockLink' => 'Link', // todo readd once Linkable is SS4 compatible
    );

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $image = UploadField::create('Image')
            //->setFolderName('Uploads/Blocks/Content')
        ;
        $fields->insertBefore($image, 'Content');

        /* // todo readd once Linkable is SS4 compatible
        $fields->addFieldToTab(
            'Root.Main',
            LinkField::create('BlockLinkID', 'Link'),
            'Image'
        );
        */

        $fields->insertAfter(TextField::create('SubTitle'), 'Title');
    }

}