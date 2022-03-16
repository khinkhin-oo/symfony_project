<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Repository\InvoiceLineRepository;
use Symfony\Component\HttpFoundation\Request;

class InvoiceController extends AbstractController
{
    

    /**
     * @Route("/invoice/{invoice}")
     */
    public function invoice(int $invoice, Request $request, InvoiceLineRepository $invoiceLineRepository): Response
    {  
        $invoiceline = $invoiceLineRepository->findByInvoiceId($invoice);

        if (!$invoiceline) {
          throw $this->createNotFoundException( 'No invoice line found for id '.$invoice); 
        }

        return $this->render('invoice/index.html.twig',array(
                    'invoicelines' => $invoiceline));
    }

}
