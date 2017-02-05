<?php

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