<?php

if (!class_exists('UserDefinedForm')) {
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
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = singleton('Block')->getCMSFields();

        if (class_exists('UserDefinedForm')) {
            $fields->addFieldToTab('Root.Main', DropdownField::create(
                'FormID',
                'Form',
                UserDefinedForm::get()->map()
                )->setEmptyString('')
                ->setDescription('select an existing User Defined Form to display')
            );
        }

        $fields->addFieldToTab('Root.Main', HtmlEditorField::create('Content'));

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
     * @return bool
     */
    public function canCreate($member = null)
    {
        if (!class_exists('UserDefinedForm')) {
            return false;
        }
        return parent::canCreate();
    }

    /**
     * @param null $member
     * @return bool
     */
    public function canView($member = null)
    {
        if (!class_exists('UserDefinedForm')) {
            return false;
        }
        return parent::canView();
    }
}