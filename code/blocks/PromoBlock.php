<?php

class PromoBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('PromoBlock.SINGULARNAME', 'Promo Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('PromoBlock.PLURALNAME', 'Promo Blocks');
    }

    /**
     * @var array
     */
    private static $many_many = array(
        'Promos' => 'PromoObject',
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
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        if ($this->ID) {
            $config = GridFieldConfig_RelationEditor::create();
            if (class_exists('GridFieldSortableRows')) {
                $config->addComponent(new GridFieldSortableRows('SortOrder'));
            }
            if (class_exists('GridFieldAddExistingSearchButton')) {
                $config->removeComponentsByType('GridFieldAddExistingAutocompleter');
                $config->addComponent(new GridFieldAddExistingSearchButton());
            }
            $promos = $this->Promos()->sort('SortOrder');
            $promoField = GridField::create('Promos', 'Promos', $promos, $config);

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