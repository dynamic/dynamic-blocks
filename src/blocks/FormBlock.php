<?php

namespace Dynamic\DynamicBlocks\Block;

use SheaDawson\Blocks\Model\Block;
use SilverStripe\Control\Controller;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

if (!class_exists(UserDefinedForm::class)) {
    return;
}

class FormBlock extends Block
{
    /**
     * @var string
     */
    private static $singular_name = 'Form Block';

    /**
     * @var string
     */
    private static $plural_name = 'Form Blocks';

    /**
     * @var array
     */
    private static $db = array(
        'Content' => 'HTMLText',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Form' => 'UserDefinedForm',
    );

    /**
     * @var string
     */
    private static $table_name = 'FormBlock';

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = singleton(Block::class)->getCMSFields();

        if (class_exists('UserDefinedForm')) {
            $fields->addFieldToTab('Root.Main', DropdownField::create(
                'FormID',
                'Form',
                UserDefinedForm::get()->map()
                )->setEmptyString('')
                ->setDescription('select an existing User Defined Form to display')
            );
        }

        $fields->addFieldToTab('Root.Main', HTMLEditorField::create('Content'));

        return $fields;
    }

    /**
     * @return Forms|HTMLText
     */
    public function BlockForm()
    {
        if ($this->Form()->exists()) {
            $controller = new UserDefinedForm_Controller($this->Form());
            $current = Controller::curr();
            if ($current && $current->getAction() == 'finished') {
                return $controller->renderWith('ReceivedFormSubmission');
            }
            $form = $controller->Form();
            return $form;
        }
    }

    /**
     * @param null $member
     * @param array $context
     * @return bool
     */
    public function canCreate($member = NULL, $context = [])
    {
        if (!class_exists('UserDefinedForm')) {
            return false;
        }
        return parent::canCreate();
    }

    /**
     * @param null $member
     * @param array $context
     * @return bool
     */
    public function canView($member = NULL, $context = [])
    {
        if (!class_exists('UserDefinedForm')) {
            return false;
        }
        return parent::canView();
    }
}