<?php

namespace StoreSeo\Hook;

use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;

/**
 * Class StoreSeoHook
 * @package StoreSeo\Hook
 * @author Etienne Perriere <eperriere@openstudio.fr>
 */
class StoreSeoHook extends BaseHook
{
    public function onModuleConfig(HookRenderEvent $event)
    {
        $event->add($this->render('storeseo-configuration.html'));
    }
}