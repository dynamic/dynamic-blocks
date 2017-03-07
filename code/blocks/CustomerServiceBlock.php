<?php

class CustomerServiceBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('CustomerServiceBlock.SINGULARNAME', 'Customer Service Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('CustomerServiceBlock.PLURALNAME', 'Customer Service Blocks');
    }

    /**
     * @var array
     */
    private static $db = array(
        'Title' => 'Varchar(255)',
        'Website' => 'Varchar(255)',
        'Phone' => 'Varchar(40)',
        'Email' => 'Varchar(255)',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $self =& $this;

        $this->beforeUpdateCMSFields(function ($fields) use ($self) {
            $fields->dataFieldByName('Title')
                ->setTitle('Name');

            $fields->replaceField('Country', CountryDropdownField::create('Country'));
            
            if ($website = $fields->dataFieldByName('Website')) {
                $website->setAttribute('placeholder', 'http://');
            }

            $fields->replaceField('Email', EmailField::create('Email'));

            $fields->dataFieldByName('Suburb')
                ->setTitle('City');
        });

        return $fields;
    }
}