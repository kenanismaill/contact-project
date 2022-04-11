<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ContactController extends Controller
{
    /**
     * @Route("/address-bock", name="get.contact", methods={"GET"})
     * @param Request $request
     * @return Response|null
     */
    public function indexAction(Request $request)
    {

        $contacts = $this->getDoctrine()
            ->getRepository(Contact::class)->findAll();
        
        return $this->render('contact/index.html.twig', [
            'data' => $contacts,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR . 'src\\AppBundle\\tmp\\galleries\\',
        ]);
    }
    
    /**
     * @Route("/contact/create", name="create.contact", methods={"GET"})
     */
    public function createAction()
    {
        return $this->render('contact/create.html.twig');
    }
    
    /**
     * @Route("/contact", name="store.contact", methods={"POST"})
     */
    public function storeAction(Request $request)
    {
        $file = $request->files->get('Picture');
        $data = $request->request->all();
        if ($file) {
            try {
                $tmpDir = __DIR__ . '/../tmp/galleries/';
                $extension = $file->getClientOriginalExtension();
                $imageName = $this->getUniqueImageName($tmpDir, $extension);
                $file->move($tmpDir, $imageName);
                $data['Picture'] = $imageName;
                
            } catch (\Exception $e) {
                return new Response($e->getMessage());
            }
        }
        
        /**@var ContactRepository $repo */
        $repo = $this->getDoctrine()->getRepository(Contact::class);
        $response = $repo->insert($data);
        
        if ($response->isSuccess()) {
            return $this->redirectToRoute('get.contact');
        } else
            return $this->redirectToRoute('get.contact');
        
    }
    
    /**
     * @Route("/contact/{contact}/edit", name="edit.contact", methods={"GET"})
     */
    public function editAction(Contact $contact)
    {
        return $this->render('contact/edit.html.twig', [
            'contact' => $contact
        ]);
    }
    
    /**
     * @Route("/contact/{contact}/update", name="update.contact", methods={"PUT","POST"})
     */
    public function updateAction(Request $request, Contact $contact)
    {
        $file = $request->files->get('Picture');
        
        $data = $request->request->all();
        if ($file) {
            try {
                $tmpDir = __DIR__ . '/../tmp/galleries/';
                $extension = $file->getClientOriginalExtension();
                $imageName = $this->getUniqueImageName($tmpDir, $extension);
                $file->move($tmpDir, $imageName);
                $data['Picture'] = $imageName;
                
            } catch (\Exception $e) {
                return new Response($e->getMessage());
            }
        }
        
        /**@var ContactRepository $repo */
        $repo = $this->getDoctrine()->getRepository(Contact::class);
        
        $response = $repo->update($contact, $data);
        
        if ($response->isSuccess()) {
            return $this->redirectToRoute('get.contact');
        } else
            return $this->redirectToRoute('get.contact');
        
    }
    
    /**
     * @Route("/contact/{id}/delete", name="delete.contact", methods={"GET"})
     */
    public function deleteAction($id)
    {
        $contact = $this->getDoctrine()
            ->getRepository(Contact::class)->find($id);
        
        /**@var ContactRepository $repo */
        $repo = $this->getDoctrine()->getRepository(Contact::class);
        $repo->delete($contact);
        
        return $this->redirectToRoute('get.contact');
    }
    
    private function getUniqueImageName(string $cdnPath, string $extension): string
    {
        $imageName = substr(base_convert(time(), 10, 36) . md5(microtime()), 0, 16) . '.' . $extension;
        
        if (file_exists($cdnPath . '/' . $imageName)) {
            return $this->getUniqueImageName($cdnPath, $extension);
        }
        
        return $imageName;
    }
}
