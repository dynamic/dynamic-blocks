<?php

namespace Dynamic\DynamicBlocks\Task;

use Dynamic\DynamicBlocks\Model\AccordionPanel;
use Dynamic\DynamicBlocks\Model\PageSectionObject;
use Dynamic\DynamicBlocks\Model\PhotoGalleryBlockImage;
use Dynamic\DynamicBlocks\Model\PromoObject;
use SilverStripe\Dev\BuildTask;

/**
 * Class BlocksVersionedObjectsTask
 */
class BlocksVersionedObjectsTask extends BuildTask
{

    /**
     * @var string
     */
    protected $title = 'Publish Block Objects';

    /**
     * @var string
     */
    protected $description = 'Migrate block objects from alpha releases';

    /**
     * @var bool
     */
    protected $enabled = true;

    /**
     * @param $request
     */
    public function run($request)
    {
        $this->updateObjects();
    }

    /**
     * migrate all promos based on page type.
     */
    public function updateObjects()
    {
        $objects = [
            AccordionPanel::class,
            PageSectionObject::class,
            PhotoGalleryBlockImage::class,
            PromoObject::class
        ];
        $ct = 0;
        foreach ($objects as $object) {
            $results = $object::get();
            foreach ($results as $result) {
                $result->doPublish('Stage', 'Live');
                $ct++;
            }
        }
        echo '<p>'.$ct.' block objects updated.</p>';
    }

}
