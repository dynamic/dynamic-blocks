<?php

namespace Dynamic\DynamicBlocks\Model;

use Dynamic\DynamicBlocks\Block\PageSectionBlock;
use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBHTMLText;
use SilverStripe\ORM\ValidationResult;

/**
 * Class PageSectionObject
 *
 * @property string $Name
 * @property string $Title
 * @property DBHTMLText $Content
 * @property int $SortOrder
 * @property int $ImageID
 * @property int $PageSectionBlockID
 */
class PageSectionObject extends DataObject
{
    /**
     * @return string
     */
    private static $singular_name = 'Page Section';

    /**
     * @return string
     */
    private static $plural_name = 'Page Sections';

    /**
     * @var array
     */
    private static $db = array(
        'Name' => 'Varchar(255)',
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
        'SortOrder' => 'Int',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Image' => Image::class,
        'PageSectionBlock' => PageSectionBlock::class,
        'BlockLink' => Link::class, // todo readd once Linkable is SS4 compatable
    );

    /**
     * @var string
     */
    private static $table_name = 'PageSectionObject';

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
            'PageSectionBlockID',
            'SortOrder',
        ));

        $fields->dataFieldByName('Name')->setDescription('For internal reference only');

        $image = $fields->dataFieldByName('Image');
        $image->setFolderName('Uploads/PageSections');
        $fields->insertBefore($image, 'Content');

        return $fields;
    }

    /**
     * @return ValidationResult
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
