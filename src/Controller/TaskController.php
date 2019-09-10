<?php

namespace App\Controller;

use App\Entity\TaskManagement;
use App\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /**
     * @Route("/task", name="task", methods={"GET", "POST"})
     */
    public function index(Request $request)
    {
//      $session = $request->getSession();
//      $session->start();
      echo "<pre>";
      var_dump($_POST);
      var_dump($_SESSION["_sf2_attributes"]["_csrf/authenticate"]);
      echo "</pre>";

      $task_post =new TaskManagement();

      $task_post->setCreatedAt(new \DateTime());
      $task_post->setUpdatedAt(new \DateTime());

      /**
       * src/Entity/TaskManagementで作成したgetMethod,setMethodと
       * src/From/TaskTypeで作成した、formの要素を利用できるようにしている
       */
      $form = $this->createForm(TaskType::class, $task_post);
          $form ->add('save', SubmitType::class);

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()){
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->persist($task_post);
        $entityManager->flush();

        return $this->redirectToRoute('task_show_all');
      }

        return $this->render('task/index.html.twig', [

          'controller_name' => 'TaskController',
          'form' => $form->createView(),
          'task_post' => $task_post,
        ]);
    }
  /**
   * @Route("/task_show", name="task_show_all", methods={"GET", "POST"})
   */
  public function showAll()
  {
    /*
     * EntityManager はデータベースを読み書きする際に利用し、getRepository() で対象のエンティティを指定し、
     * findAll() ですべて取得しています。これは「SELECT * FROM posts」と同じ意味です。
     * 取得したデータは render() の箇所ででテンプレートに渡しています。
     */

    $entityManager =$this->getDoctrine()->getManager();
    $task = $this->getDoctrine()
      ->getRepository(TaskManagement::class)
      ->findAll();

    return $this->render('task/show.html.twig', [
      'controller_name' => 'TaskController',
      'taskList' => $task,
    ]);
  }

  /**
   * @Route("/task/{user_name}/show", name="task_show_user", methods={"GET","POST","DELETE"})
   */
  public function showUser(Request $request, $user_name){
    /**
     * データベースから取得
     */
    $entityManager=$this->getDoctrine()->getManager();
    $task_show_user =$this->getDoctrine()
      ->getRepository(TaskManagement::class)
      ->findBy(
        array(
        'name' => $user_name)
      );

    /**
     * formを作成の準備
     */
    $task_edit_user = new TaskManagement();
    $task_edit_user -> setCreatedAt(new \DateTime());
    $task_edit_user -> setUpdatedAt(new \DateTime());
    $task_edit_user -> setName($user_name);

    $form = $this->createForm(TaskType::class,$task_edit_user);
    $form ->add('id');
//    $form ->add('status',TaskType::class, array('required' => false));
//    $form ->add('comment',TaskType::class, array('required' => false));
    $form ->add('update', SubmitType::class, array('label' => 'update'));
//    $form ->add('delete', SubmitType::class, array('label' => 'delete'));
    $form ->add('name', HiddenType::class,array());

    $form->handleRequest($request);

    echo '<pre>';
    var_dump($request->getContent());
    var_dump($_POST);

    echo '</pre>';

    if($form->isSubmitted() && $form->isValid()){

      if($_POST['task']['update'] == ''){

        $id=($form->get('id')->getData());

        $entityManager=$this->getDoctrine()->getManager();
        $task_update_user = $entityManager->getRepository(TaskManagement::class)
          ->find($id);

        if($_POST['task']['task'] !== ''){
          $task_update_user->setTask($form->get('task')->getData());
        }

        if($_POST['task']['status'] !== ''){
          $task_update_user->setStatus($form->get('status')->getData());
        }

        if($_POST['task']['comment'] !== ''){
          $task_update_user->setComment($form->get('comment')->getData());
        }

        $entityManager->flush();

        return $this->redirectToRoute('task_show_all');
      }
//      if( $_POST['task']['delete'] == ''){
      if( $_POST['task']['update'] == 'delete'){

        $id=($form->get('id')->getData());

        $entityManager=$this->getDoctrine()->getManager();
        $task_delete_data = $entityManager->getRepository(TaskManagement::class)
          ->find($id);

//        $task_update_user->setTask($form->get('task')->getData());

        $entityManager->remove($task_delete_data);

        $entityManager->flush();

        return $this->redirectToRoute('task_show_all');
      }
    }

    /**
     * 表示の処理
     */
    return $this->render('task/show_user.html.twig',[
      'controller_name' => 'TaskController',
      'taskUserList' => $task_show_user,
      'form' => $form ->createView(),
    ]);
  }


}
