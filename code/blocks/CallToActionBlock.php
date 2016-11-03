<?php

class CallToActionBlock extends Block
{
    /**
     * @var string
     */
    private static $singular_name = 'Call To Action Block';

    /**
     * @var string
     */
    private static $plural_name = 'Call To Action Blocks';

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