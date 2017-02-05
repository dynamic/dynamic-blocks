<?php

class AccordionPanel extends DataObject
{
    /**
     * @var string
     */
    private static $singular_name = 'Accordion Panel';

    /**
     * @var string
     */
    private static $plural_name = 'Accordion Panels';

    /**
     * @var string
     */
    private static $description = 'A panel for a Accordion widget';

    /**
     * @var array
     */
    private static $db = array(
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
        'Sort' => 'Int',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Accordion' => 'AccordionBlock',
        'Image' => 'Image',
        'BlockLink' => 'Link',
    );

    /**
     * @var string
     */
    private static $default_sort = 'Sort';

    /**
     * @var array
     */
    private static $extensions = [
        'VersionedDataObject'
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(array(
            'Sort',
            'AccordionID',
        ));

        $fields->addFieldToTab(
            'Root.Main',
            ImageUploadField::create('Image')
                ->setFolderName('Uploads/Elements/Accordions'),
            'Content'
        );

        $fields->addFieldToTab(
            'Root.Main',
            LinkField::create('BlockLinkID', 'Link'),
            'Image'
        );

        return $fields;
    }

    /**
     * @return ValidationResult
     */
    public function validate()
    {
        $result = parent::validate();

        if (!$this->Title) {
            $result->error('Title is required');
        }

        return $result;
    }

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
