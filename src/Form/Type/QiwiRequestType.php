<?php

namespace Form\Type;

use Model\QiwiRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class QiwiRequestType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('command', ChoiceType::class, [
                'required' => true,
                'constraints' => [new NotBlank()],
                'choices' => ['check' => 'check', 'pay' => 'pay']
            ])
            ->add('txn_id', TextType::class, [
                'constraints' => [new NotBlank()],
            ])
            ->add('txn_date', TextType::class, [
                'constraints' => [new Length(14)],
            ])
            ->add('account', TextType::class, [
                'constraints' => [new NotBlank(), new Length(['min' => 1, 'max' => 50])],
            ])
            ->add('sum', MoneyType::class, [
                'constraints' => [new NotBlank()],
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QiwiRequest::class,
        ]);
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return '';
    }
}
