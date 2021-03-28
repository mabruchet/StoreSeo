<?php

namespace StoreSeo\Smarty\Plugins;

use StoreSeo\StoreSeo;
use Thelia\Model\ConfigQuery;
use TheliaSmarty\Template\AbstractSmartyPlugin;
use TheliaSmarty\Template\SmartyPluginDescriptor;

/**
 * Class StoreSeoPlugin
 * @package StoreSeo\Smarty\Plugins
 * @author Etienne Perriere <eperriere@openstudio.fr>
 */
class StoreSeoPlugin extends AbstractSmartyPlugin
{

    /**
     * @return SmartyPluginDescriptor[] an array of SmartyPluginDescriptor
     */
    public function getPluginDescriptors()
    {
        return [
            new SmartyPluginDescriptor("function", "store_seo_meta", $this, "changeSeoMeta")
        ];
    }

    /**
     * Assign meta title, description and keyword for the template
     *
     * @param array $params
     * @param \Smarty $smarty
     */
    public function changeSeoMeta($params, &$smarty)
    {
        // Get language and moduleConfig
        $locale = $params['locale'];

        // Get store title
        $smarty->assign("store_name", StoreSeo::getConfigValue('title', ConfigQuery::read('stome_name'), $locale));

        // Get store description
        $smarty->assign("store_description", StoreSeo::getConfigValue('description', ConfigQuery::read('stome_description'), $locale));

        // Get store keywords
        $smarty->assign("default_keywords", StoreSeo::getConfigValue('keywords', null, $locale));
    }
}
