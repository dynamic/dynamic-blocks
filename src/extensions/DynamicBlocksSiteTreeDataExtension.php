<?php

namespace Dynamic\DynamicBlocks\ORM;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class DynamicBlocksSiteTreeDataExtension extends DataExtension
{
    /**
     * @param FieldList $fields
     */
    /*
    public function updateCMSFields(FieldList $fields) // todo readd once Groupable GridField is SS4 compatible
    {
        if ($blocks = $fields->dataFieldByName('Blocks')) {
            $config = $blocks->getConfig();

            if ($this->owner->blockManager) {
                $areas = $this->owner->blockManager->getAreasForPageType($this->owner->ClassName);

                if ($areas && count($areas)) {
                    $config->addComponent(new GridFieldGroupable(
                        'BlockArea',
                        'Area',
                        'none',
                        $areas
                    ));
                }
            }
        }
    }
    */
}