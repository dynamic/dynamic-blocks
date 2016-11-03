<?php

class ImageBlock extends Block
{
    /**
     * @return string
     */
    public function singular_name()
    {
        return _t('ImageBlock.SINGULARNAME', 'Image Block');
    }

    /**
     * @return string
     */
    public function plural_name()
    {
        return _t('ImageBlock.PLURALNAME', 'Image Blocks');
    }

    /**
     * @var array
     */
    private static $has_one = array(
        'Image' => 'Image',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->dataFieldByName('Title')->setDescription('Internal reference only');
        $fields->dataFieldByName('Image')->setFolderName('Uploads/ImageBlocks');

        return $fields;
    }

    /**
     * @param null $member
     * @return bool|null
     */
    public function canCreate($member = null)
    {
        if (!$member || !(is_a($member, 'Member')) || is_numeric($member)) {
            $member = Member::currentUserID();
        }

        // Standard mechanism for accepting permission changes from extensions
        $extended = $this->extendedCan('canCreate', $member);
        if ($extended !== null) {
            return $extended;
        }

        return parent::canCreate($member);
    }

    /**
     * @param null $member
     * @return bool|null
     */
    public function canView($member = null)
    {
        if (!$member || !(is_a($member, 'Member')) || is_numeric($member)) {
            $member = Member::currentUserID();
        }

        // Standard mechanism for accepting permission changes from extensions
        $extended = $this->extendedCan('canView', $member);
        if ($extended !== null) {
            return $extended;
        }

        return parent::canView($member);
    }
}