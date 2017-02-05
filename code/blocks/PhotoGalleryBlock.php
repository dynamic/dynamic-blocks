<?php

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
        'Images' => 'PhotoGalleryBlockImage'
    );

    /**
     * @return FieldList
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

class PhotoGalleryBlock_Controller extends Block_Controller
{
    /**
     *
     */
    public function init()
    {
        Requirements::css('dynamic-blocks/thirdparty/lightbox/lightbox.css');
        Requirements::javascript('dynamic-blocks/thirdparty/lightbox/lightbox.min.js');
    }
}