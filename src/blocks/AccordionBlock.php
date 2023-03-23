<?php

namespace Dynamic\DynamicBlocks\Block;

use Dynamic\DynamicBlocks\Controller\AccordionBlockController;
use Dynamic\DynamicBlocks\Model\AccordionPanel;
use SheaDawson\Blocks\Model\Block;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\ORM\DataList;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

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
        'Panels' => AccordionPanel::class,
    );

    /**
     * @var string
     */
    private static $table_name = 'AccordionBlock';

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
        if (class_exists(GridFieldOrderableRows::class)) {
            $config->addComponent(new GridFieldOrderableRows());
        }
        $config->removeComponentsByType('GridFieldAddExistingAutocompleter');
        $config->removeComponentsByType(GridFieldDeleteAction::class);
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

    /**
     * @return mixed|object|\SheaDawson\Blocks\Model\BlockController|Injector
     */
    public function getController()
    {
        $controller = Injector::inst()->create(AccordionBlockController::class, $this);
        $controller->init();

        return $controller;
    }
}
