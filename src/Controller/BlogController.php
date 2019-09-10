<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019/04/03
 * Time: 5:38
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
  /**
   * @Route("/blog/{page}", name="blog_List", requirements={"page"="\d+"})
   *
   */

  public function bloglist($page = 1){
    $message = "ブログのリスト表示";

    return
      $this->render('blog/list.html.twig',[
        'message' => $message,
      ]);
  }

  /**
   *
   *  ex. /blog/en/2019/{slug}.html
   *
   * @Route(
   *     "/blog/{_locale}/{year}/{slug}.{_format}",
   *     defaults={"_format": "html"},
   *     requirements={
   *         "_locale": "en|fr",
   *         "_format": "html|rss",
   *         "year": "\d+"
   *     }
   * )
   */
  public function show($slug){
    $message = "ブログ個別ページの表示";

    return $this->render('blog/show.html.twig',
      ['message' => $message,]
      );
  }

  /**
   * @Route("/blog/{slug}",name="hobby_show")
   */
  public function hobby($slug)
  {
    // ...

    //
    // ex. /blog/category=hobby?my-hobby-post
    $url = $this->generateUrl(
      'hobby_show',
      [
        'category' => 'hobby',
        'slug' => 'my-hobby-post']
    );

    $message = "趣味の投稿ページの表示";

    return $this->render('blog/hobby.html.twig',
      ['message' => $message,]
    );
  }

  /**
   * @Route({
   *     "nl": "/over-ons",
   *     "en": "/about-us"
   * }, name="about_us")
   */
  public function about(){
    $message = "aboutページの表示";

    return $this->render('main/about.html.twig',
      ['message' => $message,]
    );
  }
}