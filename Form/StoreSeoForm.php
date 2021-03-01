<?php

namespace StoreSeo\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Thelia\Form\BaseForm;

class StoreSeoForm extends BaseForm
{
    public static function getName()
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
                TextType::class,
                ['label' => $this->translator->trans('Store name', [], 'storeseo.fo.default')]
            )
            ->add(
                'description',
                TextType::class,
                ['label' => $this->translator->trans('Store description', [], 'storeseo.fo.default')]
            )
            ->add(
                'keywords',
                TextType::class,
                ['label' => $this->translator->trans('Keywords', [], 'storeseo.fo.default')]
            )
        ;
    }
}
