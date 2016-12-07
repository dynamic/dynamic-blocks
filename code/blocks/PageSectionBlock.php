<?php

/**
 * Class PageSectionBlock
 *
 * @method HasManyList $Sections
 */
class PageSectionBlock extends Block
{

    /**
     * @var string
     */
    private static $singular_name = 'Page Section Block';

    /**
     * @var string
     */
    private static $plural_name = 'Page Section Blocks';

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
            if (class_exists('GridFieldSortableRows')) {
                $config->addComponent(new GridFieldSortableRows('SortOrder'));
            }
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