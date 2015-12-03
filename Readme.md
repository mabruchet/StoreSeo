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

They will be used on pages with no SEO meta configured (home, contact, ...).

## Integration

Open the layout.tpl file of your template.

Add this line in the ```<head>```  section, before the ```<title>``` tag :

```
{store_seo_meta locale=$lang_locale title=$page_title description=$page_description}
```


Also add this in the ```{block name="meta"}```, after the ```<meta name="description">``` tag :

```
{if $page_keywords}
    <meta name="keywords" content="{$page_keywords}">
{/if}
```
