<?php

class PhotoGalleryBlockImage extends DataObject
{
    /**
     * @var string
     */
    private static $singular_name = 'Gallery Image';

    /**
     * @var string
     */
    private static $plural_name = 'Gallery Images';

    /**
     * @var array
     */
    private static $db = array(
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
        'SortOrder' => 'Int',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'PhotoGallery' => 'PhotoGalleryBlock',
        'Image' => 'Image',
    );

    /**
     * @var array
     */
    private static $summary_fields = array(
        'Image.CMSThumbnail' => 'Image',
        'Title' => 'Title',
    );

    /**
     * @var array
     */
    private static $searchable_fields = array(
        'Title',
        'Content',
    );

    /**
     * @var array
     */
    private static $extensions = [
        'VersionedDataObject'
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(array(
            'SortOrder',
            'PhotoGalleryID',
        ));

        $image = $fields->dataFieldByName('Image')->setFolderName('Uploads/Blocks/PhotoGallery/');
        $fields->insertBefore($image, 'Content');

        return $fields;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canCreate($member = null)
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canView($member = null)
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canEdit($member = null)
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canDelete($member = null)
    {
        return true;
    }
}
