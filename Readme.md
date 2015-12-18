# Store Seo

Manage translation for your store SEO meta.

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is StoreSeo.
* Activate it in your thelia administration panel

### Composer

Add it in your main thelia composer.json file

```
composer require thelia/store-seo-module:~1.0
```

## Usage

Once activated, click on the configuration button of the module.

Then, select one of your store available language and fill inputs with your store title, description and keywords. Save and do it for each of your language.

They will be used on pages with no SEO meta configured.

## Integration

Open the layout.tpl file of your template.

Check the ```Define some stuff for Smarty``` section at the top of the file, and be sur that you have this assignation:

```
{assign var="lang_locale" value={lang attr="locale"}}
```


Add this line in the ```<head>```  section, before the ```<title>``` tag :

```
{store_seo_meta locale=$lang_locale}
```


Also add this in the ```{block name="meta"}```, after the ```<meta name="description">``` tag :

```
{if $page_keywords}
    <meta name="keywords" content="{$page_keywords}">
{/if}
```

Finally, be sure that you have no ```{$page_title = {config key="store_name"}}``` declaration in your other template files.
