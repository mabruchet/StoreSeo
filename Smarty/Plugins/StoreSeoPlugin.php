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

        // Check if the page title is the default ones
        if ($params['title'] == ConfigQuery::getStoreName() || !isset($params['title'])) {
            $smarty->assign("page_title", StoreSeo::getConfigValue('title', null, $locale));
        }

        // Check if the page title is the default ones
        if ($params['description'] == ConfigQuery::getStoreDescription() || !isset($params['description'])) {
            $smarty->assign("page_description", StoreSeo::getConfigValue('description', null, $locale));
        }

        // Get translated meta
        $keyword = StoreSeo::getConfigValue('keywords', null, $locale);

        // Assign translated meta to the template variables
        $smarty->assign("page_keywords", $keyword);
    }
}