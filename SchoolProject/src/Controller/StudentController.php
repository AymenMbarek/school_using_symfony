<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Student;
use App\Form\StudentType;

/**
 * @Route("/student")
 */
class StudentController extends AbstractController
{
    /**
     * @Route("/", name="index_student")
     */
    public function index(): Response
    {
        $repStudent = $this->getDoctrine()->getRepository(Student::class);
        $theStudents = $repStudent->findAll();
        return $this->render('student/index.html.twig', [
            'listeStudents' => '$theStudents',
        ]);
    }
    /**
     * @Route("/nouveau", name="nouvel_student")
     */
    public function nouveau(Request $request)
    {
        $student =new Student();
        $frm = $this->createForm(StudentType::class, $student);

        $frm->handleRequest($request);
        if($frm->isSubmitted() && $frm->isValid())
        { $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();
        }

        return $this->render('student/nouveau.html.twig',
            ['frm' =>$frm->createView(),
            ]);
    }

    /**
     * @Route("/afficher", name="afficher_student")
     */
    public  function afficher()
    {
        return $this->render('student/afficher.html.twig');
    }
    /**
     * @Route("/edit", name="edit_student")
     */
    public function edit()
    {
        return $this->render('student/edit.html.twig');

    }
    /**
     * @Route("/supprimer", name="supprimer_student")
     */
    public function supprimer()
    {
        return $this->render('student/supprimer.html.twig');
    }
}
