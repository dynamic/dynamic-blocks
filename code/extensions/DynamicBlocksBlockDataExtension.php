<?php

/**
 * Class DynamicBlocksBlockDataExtension
 */
class DynamicBlocksBlockDataExtension extends DataExtension
{

    /**
     * @var array
     */
    private static $db = [
        'Name' => 'Varchar(255)',
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'Name',
    ];

    /**
     * @var array
     */
    private static $searchable_fields = [
        'Name',
    ];

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        if ($fields->dataFieldByName('Title') instanceof FormField) {
            $fields->dataFieldByName('Title')->setRightTitle('Visible in templates');
        }
        $fields->insertBefore(
            'ClassName',
            TextField::create('Name')
                ->setTitle('Name')
                ->setRightTitle('This is for internal reference.')
        );
    }

}