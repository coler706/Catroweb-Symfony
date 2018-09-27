<?php

namespace Catrobat\AppBundle\Admin;

use Catrobat\AppBundle\Entity\MediaPackage;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MediaPackageCategoriesAdmin extends AbstractAdmin
{
  protected $baseRouteName = 'adminmedia_package_category';
  protected $baseRoutePattern = 'media_package_category';

  // Fields to be shown on create/edit forms
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->add('name', TextType::class, ['label' => 'Name'])
      ->add('package', EntityType::class, [
        'class'    => MediaPackage::class,
        'required' => true,
        'multiple' => true])
      ->add('priority');
  }

  // Fields to be shown on filter forms
  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
  }

  // Fields to be shown on lists
  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
      ->addIdentifier('name')
      ->add('package', EntityType::class, ['class' => MediaPackage::class])
      ->add('_action', 'actions', [
        'actions' => [
          'edit'   => [],
          'delete' => [],
        ],
      ]);
  }
}
