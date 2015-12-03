<?php

namespace StoreSeo\Form;

use Thelia\Form\BaseForm;

/**
 * Class StoreSeoForm
 * @package StoreSeo\Form
 * @author Etienne Perriere <eperriere@openstudio.fr>
 */
class StoreSeoForm extends BaseForm
{
    public function getName()
    {
        return 'storeseo_form_config';
    }

    /**
     * @return null
     */
    protected function buildForm()
    {
        $this->formBuilder
            ->add(
                'title',
                'text',
                ['label' => $this->translator->trans('Store name', [], 'storeseo.fo.default')]
            )
            ->add(
                'description',
                'text',
                ['label' => $this->translator->trans('Store description', [], 'storeseo.fo.default')]
            )
            ->add(
                'keywords',
                'text',
                ['label' => $this->translator->trans('Keywords', [], 'storeseo.fo.default')]
            )
        ;
    }
}