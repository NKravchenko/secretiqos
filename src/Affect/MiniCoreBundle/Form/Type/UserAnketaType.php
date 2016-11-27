<?php

namespace Affect\MiniCoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserAnketaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'id',
                'hidden',
                [
                    'label'    => 'id',
                    'required' => true,
                    'attr' => ['class' => 'iqos_input'],
                ]
            )
            ->add(
                'referrerFirstName',
                'text',
                [
                    'required' => false,
                    'label' => 'Кто вас рекомендовал в проект?',
                    'attr'  => ['class' => 'iqos_input', 'placeholder' => 'Кто вас рекомендовал'],
                ]
            )
            ->add(
                'firstName',
                'text',
                [
                    'required' => false,
                    'label' => 'Ваше имя',
                    'attr'  => ['class' => 'iqos_input', 'placeholder' => 'Имя'],
                ]
            )
            ->add(
                'surnameName',
                'text',
                [
                    'required' => false,
                    'label' => 'Ваша фамилия',
                    'attr'  => ['class' => 'iqos_input', 'placeholder' => 'Фамилия'],
                ]
            )
            ->add(
                'mobile',
                'text',
                [
                    'required' => false,
                    'label' => 'Ваш номер телефона',
                    'attr'  => ['class' => 'iqos_input js-phone-mask', 'placeholder' => '+ 7 (___) ___-____'],
                ]
            )
            ->add(
                'email',
                'email',
                [
                    'required' => false,
                    'label' => 'Ваш E-mail',
                    'attr'  => ['class' => 'iqos_input', 'placeholder' => 'example@domain.com'],
                ]
            )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Affect\MiniCoreBundle\Entity\User'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'User';
    }
}
