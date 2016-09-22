<?php

class AccordionBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('AccordionBlock.SINGULARNAME', 'Accordion Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('AccordionBlock.PLURALNAME', 'Accordion Blocks');
    }

    /**
     * @var array
     */
    private static $db = array(
        'Content' => 'HTMLText',
        'SortOrder' => 'Int',
    );

    /**
     * @var array
     */
    private static $has_many = array(
        'Panels' => 'AccordionPanel',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(array(
            'SortOrder',
            'Panels',
        ));

        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortOrder'));
        $config->removeComponentsByType('GridFieldAddExistingAutocompleter');
        $config->removeComponentsByType('GridFieldDeleteAction');
        $config->addComponent(new GridFieldDeleteAction(false));

        if ($this->ID) {
            $fields->addFieldsToTab('Root.Panels', array(
                GridField::create('Panels', 'Accordion Panels', $this->Panels()->sort('SortOrder'), $config),
            ));
        }

        return $fields;
    }
}