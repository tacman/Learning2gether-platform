<?php

namespace App\Controller;

use App\Services\ImportSerivce;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImportController extends AbstractController
{
    /**
     * @Route("/import", name="import")
     */
    public function index(ImportSerivce $importSerivce): Response
    {
        $importSerivce->importFromBitbucket();

        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
        ]);
    }
}
