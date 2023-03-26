<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Teacher;
use App\Form\TeacherType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/teacher")
 */
class TeacherController extends AbstractController
{
    /**
     * @Route("/", name="index_teacher")
     */
    public function index(): Response
    {
        $repTeacher = $this->getDoctrine()->getRepository(Teacher::class);
        $theTeachers = $repTeacher->findAll();
        return $this->render('teacher/index.html.twig', [
            'listeTeachers' => '$theTeachers',
        ]);
    }
    /**
     * @Route("/nouveau", name="nouvel_teacher")
     */
    public function nouveau(Request $request)
    {
        $teacher =new Teacher();

        $frm = $this->createForm(TeacherType::class, $teacher);

        $frm->handleRequest($request);
        if($frm->isSubmitted() && $frm->isValid())
        { $em = $this->getDoctrine()->getManager();
            $em->persist($teacher);
            $em->flush();

            return $this->redirectToRoute('nouvel_teacher');
        }

        return $this->render('teacher/nouveau.html.twig',
            ['frm' =>$frm->createView(),
                ]);
    }

    /**
     * @Route("/afficher/{id}", name="afficher_teacher")
     */
    public  function afficher(int $id = -1)
    {
        if ($id <=0)
            return $this->redirectToRoute('index_teacher');
        else
        {
            $repTeacher = $this->getDoctrine()->getRepository(Teacher::class);
            $unTeacher = $repTeacher->findOneBy(['id' => $id]);

            return $this->render('teacher/afficher.html.twig',
                ['teacher' => $unTeacher]
            );
        }


    }
    /**
     * @Route("/edit", name="edit_teacher")
     */
    public function edit( int $id = -1)
    {
        if ($id <= 0)
            return $this->redirectToRoute('index_teacher');
        else
        {
            $repTeacher = $this->getDoctrine()->getRepository(Teacher::class);
            $unTeacher = $repTeacher->findOneBy(['id' => $id]);

            $frm = $this->createForm(TeacherType::class, $unTeacher);
            $frm->add('Edit' , SubmitType::class);

            $frm->handleRequest($request);
            if ($frm->isSubmitted() && $frm->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                return $this->redirectToRoute('index_teacher');
            }

            return $this->render('teacher/edit.html.twig' ,
                [ 'frm' => $frm->createView()
                ]
            );

        }

    }
    /**
     * @Route("/supprimer", name="supprimer_teacher")
     */
    public function supprimer()
    {
        return $this->render('teacher/supprimer.html.twig');
    }
}


