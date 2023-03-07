<?php

namespace Dynamic\DynamicBlocks\Block;

use Dynamic\DynamicBlocks\Model\PromoObject;
use SheaDawson\Blocks\Model\Block;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\Forms\GridField\GridFieldFilterHeader;
use SilverStripe\Versioned\GridFieldArchiveAction;
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

        if ($this->ID) {
            /** @var \SilverStripe\Forms\GridField\GridField $promoField */
            $promoField = $fields->dataFieldByName('Promos');
            $fields->removeByName('Promos');
            $config = $promoField->getConfig();
            $config->removeComponentsByType([
                GridFieldAddExistingAutocompleter::class,
                GridFieldDeleteAction::class,
                GridFieldArchiveAction::class,
                GridFieldFilterHeader::class,
            ])->addComponents(
                new GridFieldOrderableRows('SortOrder'),
                new GridFieldAddExistingSearchButton()
            );

            $fields->addFieldsToTab('Root.Main', array(
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
