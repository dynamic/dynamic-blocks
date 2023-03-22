<?php

namespace Dynamic\DynamicBlocks\Block;

use Dynamic\DynamicBlocks\Model\PageSectionObject;
use SheaDawson\Blocks\Model\Block;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\Forms\GridField\GridFieldFilterHeader;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

/**
 * Class PageSectionBlock
 *
 * @method HasManyList $Sections
 */
class PageSectionBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('PageSectionBlock.SINGULARNAME', 'Page Sections Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('PageSectionBlock.PLURALNAME', 'Page Sections Blocks');
    }

    /**
     * @var array
     */
    private static $has_many = [
        'Sections' => PageSectionObject::class,
    ];

    /**
     * @var string
     */
    private static $table_name = 'PageSectionBlock';

    /**
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        if ($this->ID) {
            // Sections
            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows('SortOrder'));
            $config->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
            $config->removeComponentsByType(GridFieldDeleteAction::class);
            $config->removeComponentsByType(GridFieldFilterHeader::class);
            $config->addComponent(new GridFieldDeleteAction(false));
            $sectionsField = GridField::create('Sections', 'Sections', $this->Sections()->sort('SortOrder'), $config);
            $fields->addFieldsToTab('Root.Main', array(
                $sectionsField,
            ));
        }

        return $fields;
    }

    /**
     * @return mixed
     */
    public function getPageSections()
    {
        return $this->Sections()->sort('SortOrder');
    }
}
