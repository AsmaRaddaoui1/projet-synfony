<?php

namespace App\Form;

use App\Entity\Author;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;// va convertir ce code en twig pour l'afficher car c'est un code ph) 
use Symfony\Component\OptionsResolver\OptionsResolver;//houa w el FormBuilderInterface yefhl kn fama table w ela checkbox

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('save',SubmitType::class)// amalna hethi bech tzidna boutton fil el page mtaa twig pyuisque ahna mnkhdmou ken php donc zedna ay hkeya houneya manetha ay tabdil fil affichage mtyaa ce formulaire chisir houni
        ;//::class ay haja fiha type naaml hka 
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Author::class,
        ]);
    }
}
