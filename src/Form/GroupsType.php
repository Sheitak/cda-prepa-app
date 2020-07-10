<?php

namespace App\Form;

use App\Entity\Learner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class GroupsType extends AbstractType
{
    // FormBuilder from Symfony, generates the form for sorting groups of learners according to certain fields of the specifications,
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('promotion', null, ['choice_label' => 'name'])
            ->add('sex', null, [
                'required' => false,
            ])
            ->add('age', CheckboxType::class, [
                'label'    => 'Mix Age',
                'required' => false,
                ])
            ->add('skills', null, [
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Learner::class,
            'method' => 'GET',
        ]);
    }
}
