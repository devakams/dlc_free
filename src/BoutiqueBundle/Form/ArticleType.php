<?php

namespace BoutiqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\DataTransformer\NumberToLocalizedStringTransformer; //

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation', "text")
            ->add('description', "text")
            ->add('prix','number', array(
                'scale'         => 2,
                'attr'          => array(
                    //'_type'         => "number",
                    'min'           => 0.00,
                    'step'          => 0.01,
                )
            ))
            ->add('quantite', "integer")
            ->add('imageFile', "file")
            ->add('Valider', 'submit')
            ->add('Annuler', 'reset')
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BoutiqueBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'boutiquebundle_article';
    }


}
