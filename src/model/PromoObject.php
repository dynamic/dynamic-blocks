<?php

namespace Dynamic\DynamicBlocks\Model;

use Dynamic\DynamicBlocks\Block\PromoBlock;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordViewer;
use SilverStripe\ORM\DataObject;

class PromoObject extends DataObject
{
    /**
     * @return string
     */
    private static $singular_name = 'Promo';

    /**
     * @return string
     */
    private static $plural_name = 'Promos';

    /**
     * @var array
     */
    private static $db = array(
        'Name' => 'Varchar(255)',
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Image' => Image::class,
        //'BlockLink' => 'Link', // todo readd once Linkable is SS4 compatible
    );

    /**
     * @var array
     */
    private static $belongs_many_many = array(
        'PromoBlocks' => PromoBlock::class,
    );

    /**
     * @var string
     */
    private static $table_name = 'PromoObject';

    /**
     * @var string
     */
    private static $default_sort = 'Name ASC';

    /**
     * @var array
     */
    private static $summary_fields = array(
        'Image.CMSThumbnail' => 'Image',
        'Name' => 'Name',
        'Title' => 'Title',
    );

    /**
     * @var array
     */
    private static $searchable_fields = array(
        'Name' => 'Name',
        'Title' => 'Title',
    );

    /**
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {

            /* // todo readd once Linkable is SS4 compatible
            $fields->addFieldToTab(
                'Root.Main',
                LinkField::create('BlockLinkID', 'Link'),
                'Content'
            );
            */
        });

        $fields = parent::getCMSFields();

        $fields->removeByName(array(
            'PromoBlocks',
        ));

        $fields->dataFieldByName('Name')->setDescription('For internal reference only');

        $image = $fields->dataFieldByName('Image');
        $image->setFolderName('Uploads/Promos');
        $fields->insertBefore($image, 'Content');

        $config = GridFieldConfig_RecordViewer::create();
        $fields->addFieldToTab('Root.Blocks', GridField::create('PromoBlocks', 'Blocks', $this->PromoBlocks(), $config));

        return $fields;
    }

    /**
     * @return \SilverStripe\ORM\ValidationResult
     */
    public function validate()
    {
        $result = parent::validate();

        if (!$this->Name) {
            $result->addError('Name is requied before you can save');
        }

        return $result;
    }

    /**
     * Set permissions, allow all users to access by default.
     * Override in descendant classes, or use PermissionProvider.
     */

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canCreate($member = null, $context = [])
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canView($member = null, $context = [])
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canEdit($member = null, $context = [])
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canDelete($member = null, $context = [])
    {
        return true;
    }
}