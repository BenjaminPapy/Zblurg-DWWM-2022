<?php

namespace App\Controller;

use App\Form\EditUsersType;
use App\Form\EditUsersNameType;
use App\Form\EditUsersPasswordType;
use App\Form\EditUsersEmailType;
use App\Form\EditUsersPhoneType;
use App\Form\EditUsersAddressType;
use App\Form\PremiumType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="app_users_profile")
     */
    public function profile(): Response
    {
        
        return $this->render('admin/users/profile.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }

    /**
     * Edit a user Name
     * 
     * @Route("/users/edit/name", name="app_users_edit_name")
     */
    public function editUsersName(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditUsersNameType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_users_profile');
        }

        return $this->render('admin/users/editProfileName.html.twig', [
            'usersForm' => $form->createView()
        ]);
    }

    /**
     * Edit a user Email
     * 
     * @Route("/users/edit/email", name="app_users_edit_email")
     */
    public function editUsersEmail(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditUsersEmailType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_users_profile');
        }

        return $this->render('admin/users/editProfileEmail.html.twig', [
            'usersForm' => $form->createView()
        ]);
    }

    /**
     * Edit a user Phone number
     * 
     * @Route("/users/edit/phone", name="app_users_edit_phone")
     */
    public function editUsersPhone(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditUsersPhoneType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_users_profile');
        }

        return $this->render('admin/users/editProfilePhone.html.twig', [
            'usersForm' => $form->createView()
        ]);
    }

    /**
     * Edit a user Password
     * 
     * @Route("/users/edit/password", name="app_users_edit_password")
     */
    public function editUsersPassword(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditUsersPasswordType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_users_profile');
        }

        return $this->render('admin/users/editProfilePassword.html.twig', [
            'usersForm' => $form->createView()
        ]);
    }

    /**
     * Edit a user Address
     * 
     * @Route("/users/edit/address", name="app_users_edit_address")
     */
    public function editUsersAddress(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditUsersAddressType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_users_profile');
        }

        return $this->render('admin/users/editProfileAddress.html.twig', [
            'usersForm' => $form->createView()
        ]);
    }
}