<?php

class DynamicBlocksSiteTreeDataExtension extends DataExtension
{
    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
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
}