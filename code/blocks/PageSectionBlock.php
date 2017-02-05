<?php

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
        'Sections' => 'PageSectionObject',
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        if ($this->ID) {
            // Sections
            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows('SortOrder'));
            $config->removeComponentsByType('GridFieldAddExistingAutocompleter');
            $config->removeComponentsByType('GridFieldDeleteAction');
            $config->addComponent(new GridFieldDeleteAction(false));
            $sectionsField = GridField::create('Sections', 'Sections', $this->Sections()->sort('SortOrder'), $config);
            $fields->addFieldsToTab('Root.Sections', array(
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