<?php

namespace App\Form;

use App\Entity\Learner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class LearnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('username')
            ->add('sex', ChoiceType::class, [
                'choices' => [
                    'M' => 'M',
                    'F' => 'F',
            ]])
             ->add('age', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Range(['min' => 18, 'max' => 80]),
                ],
             ])
            ->add('skills', ChoiceType::class, [
                'choices' => [
                    'Infographics' => 'Infographics',
                    'Web Developer' => 'Web Developer',
                    'Data Analyst' => 'Data Analyst',
                    'Integrator' => 'Integrator',
                    'Web Design'=> 'Web Design',
                    'Other' => 'Other',
            ]])
            ->add('promotion', null, ['choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Learner::class,
        ]);
    }
}
