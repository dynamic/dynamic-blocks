<?php

namespace Dynamic\DynamicBlocks\Block;

use Dynamic\DynamicBlocks\Model\PhotoGalleryBlockImage;
use SheaDawson\Blocks\Controllers\BlockController;
use SheaDawson\Blocks\Model\Block;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\View\Requirements;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class PhotoGalleryBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('PhotoGalleryBlock.SINGULARNAME', 'Photo Gallery Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('PhotoGalleryBlock.PLURALNAME', 'Photo Gallery Blocks');
    }

    /**
     * @var array
     */
    private static $has_many = array(
        'Images' => PhotoGalleryBlockImage::class
    );

    /**
     * @var string
     */
    private static $table_name = 'PhotoGalleryBlock';

    /**
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'Images',
        ]);

        if ($this->owner->ID) {
            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows('SortOrder'));
            $config->removeComponentsByType('GridFieldAddExistingAutocompleter');
            $config->removeComponentsByType('GridFieldDeleteAction');
            $config->addComponent(new GridFieldDeleteAction(false));
            $imagesField = GridField::create('Images', 'Images', $this->Images()->sort('SortOrder'), $config);

            $fields->addFieldToTab('Root.Photos', $imagesField);

        }

        return $fields;
    }
}