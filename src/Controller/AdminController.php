<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019/04/07
 * Time: 21:09
 */

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
  public function createNewUserEntity()
  {
    return $this->get('fos_user.user_manager')->createUser();
  }

  public function persistUserEntity($user)
  {
    $this->get('fos_user.user_manager')->updateUser($user, false);
    parent::persistEntity($user);
  }

  public function updateUserEntity($user)
  {
    $this->get('fos_user.user_manager')->updateUser($user, false);
    parent::updateEntity($user);
  }
}