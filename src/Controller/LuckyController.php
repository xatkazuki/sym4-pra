<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019/04/03
 * Time: 0:22
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
  /**
   * @Route("/lucky/number/random/{max}", name="app_lucky_number", requirements={"max": "\d+"})
   */
  public function number($max)
  {
    $number =random_int(0,$max);

    $url=$this->generateUrl('app_lucky_number',['max'=>10]);

    return $this->render(
      'lucky/number.html.twig',
      ['number' => $number,]
    );
  }
}