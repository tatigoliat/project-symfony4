<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        $users = $this->getDoctrine()
            ->getRepository('App\Entity\User')
            ->findAll();

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/edit", name="edit")
     */
    public function createUser(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $user = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // $users = $this->getDoctrine()
                // ->getRepository('App\Entity\User')
                // ->findAll();
            // return $this->render('user/index.html.twig', [
                // 'users' => $users,
            // ]);
            return $this->redirect('/index');
        }

        return $this->render(
            'user/edit.html.twig',
            array('form' => $form->createView())
        );

    }


    public function updateUser(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('App\Entity\User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'There are no users with the id: ' . $id
            );
        }

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $user = $form->getData();
            $em->flush();
            
            return $this->redirect('/index');
        }

        return $this->render(
            'user/edit.html.twig',
            array('form' => $form->createView())
        );
    }

    public function deleteUser($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('App\Entity\User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'There are no users with the id: ' . $id
            );
        }

        $em->remove($user);
        $em->flush();

        return $this->redirect('/index');
    }
}
