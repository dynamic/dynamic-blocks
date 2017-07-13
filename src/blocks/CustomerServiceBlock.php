<?php

namespace Dynamic\DynamicBlocks\Block;

use SheaDawson\Blocks\Model\Block;
use SilverStripe\Forms\EmailField;

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
     * @var string
     */
    private static $table_name = 'CustomerServiceBlock';

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
            
            if ($website = $fields->dataFieldByName('Website')) {
                $website->setAttribute('placeholder', 'http://');
            }

            $fields->replaceField('Email', EmailField::create('Email'));
        });

        //$fields->replaceField('Country', CountryDropdownField::create('Country'));

        return $fields;
    }
}