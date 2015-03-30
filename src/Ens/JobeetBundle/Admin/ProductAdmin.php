<?php

namespace Ens\JobeetBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProductAdmin extends Admin
{
    /**
     * 
     * @param \Ens\JoobetBundle\Admin\FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper){
	$formMapper
            ->add('name')
            ->add('price')
            ->add('description')
	;
    }
    
    /**
     * 
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper){
        $datagridMapper
            ->add('name')
            ->add('price')
            ->add('description')
        ;
    }
    
    /**
     * 
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper){
	$listMapper
            ->addIdentifier('name')
            ->add('price')
            ->add('description')
	;
    }
}