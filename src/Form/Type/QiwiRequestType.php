<?php

namespace Form\Type;

use Model\QiwiRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
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
            ->add('txn_id', IntegerType::class)
            ->add('txn_date', DateTimeType::class, [
                'date_format' => 'yyyyMMddhhiiss'
            ])
            ->add('account')
            ->add('sum', MoneyType::class)
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
