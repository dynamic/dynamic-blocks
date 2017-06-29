<?php

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
        'Image' => 'Image',
        'BlockLink' => 'Link',
    );

    /**
     * @var array
     */
    private static $belongs_many_many = array(
        'PromoBlocks' => 'PromoBlock'
    );

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
     * @var array
     */
    private static $extensions = [
	    'Heyday\VersionedDataObjects\VersionedDataObject',
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {
            $fields->addFieldToTab(
                'Root.Main',
                LinkField::create('BlockLinkID', 'Link'),
                'Content'
            );
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
     * @return ValidationResult
     */
    public function validate()
    {
        $result = parent::validate();

        if (!$this->Name) {
            $result->error('Name is requied before you can save');
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
    public function canCreate($member = null)
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canView($member = null)
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canEdit($member = null)
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canDelete($member = null)
    {
        return true;
    }
}