<?php

namespace App\Admin;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\Form\Type\CollectionType;

class BookAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $listMapper): void
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

    protected function configureFormFields(FormMapper $formMapper): void
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
