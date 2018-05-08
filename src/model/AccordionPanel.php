<?php

namespace Dynamic\DynamicBlocks\Model;

use Dynamic\DynamicBlocks\Block\AccordionBlock;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

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
        'Accordion' => AccordionBlock::class,
        'Image' => Image::class,
        //'BlockLink' => 'Link', // todo readd once Linkable is SS4 compatible
    );

    /**
     * @var string
     */
    private static $table_name = 'AccordionPanel';

    /**
     * @var string
     */
    private static $default_sort = 'Sort';

    /**
     * @return \SilverStripe\Forms\FieldList
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
            UploadField::create('Image')
            //    ->setFolderName('Uploads/Elements/Accordions')
            ,
            'Content'
        );

        /* // todo readd once Linkable is SS4 compatible
        $fields->addFieldToTab(
            'Root.Main',
            LinkField::create('BlockLinkID', 'Link'),
            'Image'
        );
        */

        return $fields;
    }

    /**
     * @return \SilverStripe\ORM\ValidationResult
     */
    public function validate()
    {
        $result = parent::validate();

        if (!$this->Title) {
            $result->addError('Title is required');
        }

        return $result;
    }

    /**
     * @param null $member
     * @param array $context
     * @return bool
     */
    public function canCreate($member = null, $context = [])
    {
        return true;
    }

    /**
     * @param null $member
     * @param array $context
     * @return bool
     */
    public function canView($member = null, $context = [])
    {
        return true;
    }

    /**
     * @param null $member
     * @param array $context
     * @return bool
     */
    public function canEdit($member = null, $context = [])
    {
        return true;
    }

    /**
     * @param null $member
     * @param array $context
     * @return bool
     */
    public function canDelete($member = null, $context = [])
    {
        return true;
    }
}
