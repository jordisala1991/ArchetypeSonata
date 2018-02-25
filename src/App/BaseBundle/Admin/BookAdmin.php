<?php

namespace App\BaseBundle\Admin;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\CoreBundle\Form\Type\CollectionType;

class BookAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('abstract', 'html')
            ->add('_action', null, [
                'actions' => [
                    'delete' => [],
                ],
            ]);
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('cover', ModelListType::class, [], [
                'link_parameters' => [
                    'context' => 'default',
                    'provider' => 'sonata.media.provider.image',
                ],
            ])
            ->add('abstract', CKEditorType::class, [
                'required' => false,
            ])
            ->add('category', ModelType::class)
            ->add('reviews', CollectionType::class, [
                'by_reference' => false,
            ], [
                'edit' => 'inline',
                'inline' => 'table',
            ]);
    }
}
