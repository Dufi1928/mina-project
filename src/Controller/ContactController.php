<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Contact;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Symfony\Component\String\Slugger\SluggerInterface;
use function Symfony\Component\DependencyInjection\Loader\Configurator\env;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        sluggerInterface $slugger,
        MailerInterface $mailer,
    ): Response
    {


        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form -> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $contact = $form ->getData();
            $email = $contact ->getEmail();
            $phone = $contact ->getPhone();
            $name = $contact ->getNom();
            $subject = $contact -> getSubject();
            $messege = $contact ->getMessege();
            $surname = $contact -> getSurname();







            $transport = Transport::fromDsn('smtp://i.hrybe@gmail.com:nmolwsfzmdszpmiv@smtp.gmail.com');
//            dd($transport);
//            $transport = Transport::fromDsn('smtp://mina.osteo@gmail.com:tzeahtjzefyjbcaz@smtp.gmail.com');
            $mailer = new Mailer($transport);


            // perform some action...
            $email = (new TemplatedEmail())
                ->from('mina.osteo@gmail.com')
                ->to(new Address('i.hrybe@gmail.com'))
                ->subject("$subject")
                ->html("
                    <h3 style='font-size: 25px; font-weight: 900:'>Email - $email </h3>
                    <h3>Telephone - $phone</h3>
                    <h3>Nom - $name</h3>
                    <h3>Prenom - $surname</h3>
                    <h3>Message: </h3><p>$messege</p>

                    ")
                // path of the Twig template to render
                ->htmlTemplate('emails/mail.html.twig');
            $mailer->send($email);
        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);



    }
}
