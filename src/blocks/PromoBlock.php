<?php

namespace Dynamic\DynamicBlocks\Block;

use Dynamic\DynamicBlocks\Model\PromoObject;
use SheaDawson\Blocks\Model\Block;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use Symbiote\GridFieldExtensions\GridFieldAddExistingSearchButton;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class PromoBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('PromoBlock.SINGULARNAME', 'Promos Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('PromoBlock.PLURALNAME', 'Promos Blocks');
    }

    /**
     * @var array
     */
    private static $many_many = array(
        'Promos' => PromoObject::class,
    );

    /**
     * @var array
     */
    private static $many_many_extraFields = array(
        'Promos' => array(
            'SortOrder' => 'Int',
        ),
    );

    /**
     * @var string
     */
    private static $table_name = 'PromoBlock';

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(array(
            'Promos',
        ));

        if ($this->ID) {
            $config = GridFieldConfig_RelationEditor::create();
            $config->addComponent(new GridFieldOrderableRows('SortOrder'));
            $config->removeComponentsByType('GridFieldAddExistingAutocompleter');
            $config->addComponent(new GridFieldAddExistingSearchButton());
            $promos = $this->Promos()->sort('SortOrder');
            $promoField = GridField::create('Promos', 'Promos', $promos, $config);

            $fields->addFieldsToTab('Root.Promos', array(
                $promoField,
            ));
        }

        return $fields;
    }

    /**
     * @return mixed
     */
    public function getPromoList()
    {
        return $this->Promos()->sort('SortOrder');
    }
}