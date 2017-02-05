<?php

class AccordionBlock extends Block
{
    /**
     * @var string
     */
    private static $singular_name = 'Accordion Block';

    /**
     * @var string
     */
    private static $plural_name = 'Accordion Blocks';

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
        if (class_exists('GridFieldOrderableRows')) {
            $config->addComponent(new GridFieldOrderableRows());
        }
        $config->removeComponentsByType('GridFieldAddExistingAutocompleter');
        $config->removeComponentsByType('GridFieldDeleteAction');
        $config->addComponent(new GridFieldDeleteAction(false));

        if ($this->ID) {
            $fields->addFieldsToTab('Root.Panels', array(
                GridField::create('Panels', 'Accordion Panels', $this->Panels()->sort('Sort'), $config),
            ));
        }

        return $fields;
    }

    /**
     * @return DataList
     */
    public function getPanelList()
    {
        if ($this->Panels()->exists()) {
            return $this->Panels()->sort('Sort');
        }
        return $this->Panels();
    }
}

class AccordionBlock_Controller extends Block_Controller
{
    /**
     * @var string
     */
    private static $accordion_class = 'accordion-block';

    /**
     *
     */
    public function init()
    {
        $class = $this->AccordionClass();
        Requirements::javascript(THIRDPARTY_DIR . '/jquery-ui/jquery-ui.js');
        Requirements::customScript('
            $(function() {
                $( ".' . $class . '" ).accordion({
                    header: ".accord-header",
                    collapsible: true, heightStyle: "content"
                });
            });
        ');
    }

    /**
     * @return array
     */
    public function AccordionClass()
    {
        return Config::inst()->get('AccordionBlock_Controller', 'accordion_class');
    }
}