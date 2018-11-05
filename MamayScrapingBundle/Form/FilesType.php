<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 05.11.18
 * Time: 17:04
 */

namespace Mamay\Bundle\ScrapingBundle\Form;

use Mamay\Bundle\ScrapingBundle\Entity\Files;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FilesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', FileType::class, array('label' => 'Choose file...'))
                ->add('save', SubmitType::class, array('attr' => array('class' => 'save'),))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Files::class,
        ));
    }
}