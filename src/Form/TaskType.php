<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019/04/05
 * Time: 15:28
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;


class TaskType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name')
      ->add('status')
      ->add('task')
      ->add('comment');
//      ->add('save',SubmitType::class);
    ;
  }

}