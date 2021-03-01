<?php

namespace StoreSeo\Controller;

use StoreSeo\StoreSeo;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Form\Exception\FormValidationException;

/**
 * Class StoreSeoConfigController
 * @package StoreSeo\Controller
 * @author Etienne Perriere <eperriere@openstudio.fr>
 */
class StoreSeoConfigController extends BaseAdminController
{
    public function defaultAction()
    {
        if (null !== $response = $this->checkAuth([AdminResources::MODULE], ["storeseo"], AccessManager::VIEW)) {
            return $response;
        }

        // Get current edition language locale
        $locale = $this->getCurrentEditionLocale();

        $form = $this->createForm(
            "storeseo_form_config",
            FormType::class,
            [
                'title' => StoreSeo::getConfigValue('title', null, $locale),
                'description' => StoreSeo::getConfigValue('description', null, $locale),
                'keywords' => StoreSeo::getConfigValue('keywords', null, $locale)
            ]
        );

        $this->getParserContext()->addForm($form);

        return $this->render("storeseo-configuration");
    }

    public function saveAction()
    {
        if (null !== $response = $this->checkAuth([AdminResources::MODULE], ["storeseo"], AccessManager::UPDATE)) {
            return $response;
        }

        $baseForm = $this->createForm("storeseo_form_config");

        $errorMessage = null;

        // Get current edition language locale
        $locale = $this->getCurrentEditionLocale();

        try {
            $form = $this->validateForm($baseForm);
            $data = $form->getData();

            // Save data
            StoreSeo::setConfigValue('title', $data["title"], $locale);
            StoreSeo::setConfigValue('description', $data["description"], $locale);
            StoreSeo::setConfigValue('keywords', $data["keywords"], $locale);

        } catch (FormValidationException $ex) {
            // Invalid data entered
            $errorMessage = $this->createStandardFormValidationErrorMessage($ex);
        } catch (\Exception $ex) {
            // Any other error
            $errorMessage = $this->getTranslator()->trans('Sorry, an error occurred: %err', ['%err' => $ex->getMessage()], StoreSeo::DOMAIN_NAME, $locale);
        }

        if (null !== $errorMessage) {
            // Mark the form as with error
            $baseForm->setErrorMessage($errorMessage);

            // Send the form and the error to the parser
            $this->getParserContext()
                ->addForm($baseForm)
                ->setGeneralError($errorMessage)
            ;
        } else {
            $this->getParserContext()
                ->set("success", true)
            ;
        }

        return $this->defaultAction();
    }
}
