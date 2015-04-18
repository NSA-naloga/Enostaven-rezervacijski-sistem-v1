<?php

namespace NSA\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NalogaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naslov')
            ->add('opis')
            ->add('kljucneBesede')
            ->add('datumKreiranja')
            ->add('datumObjave')
            ->add('zacetniDatum')
            ->add('datumOddaje')
            ->add('steviloKandidatov')
            ->add('profesor')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NSA\Bundle\Entity\Naloga'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'nsa_bundle_naloga';
    }
}
