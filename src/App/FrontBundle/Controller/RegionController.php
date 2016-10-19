<?php

namespace App\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\FrontBundle\Entity\Region;

class RegionController extends Controller
{
    /**
     * @Route("/results", name="region_results")
     */
    public function indexResultsAction()
    {
        $datatable = $this->get('app.front.datatable.region');
        $datatable->buildDatatable();
        $query = $this->get('sg_datatables.query')->getQueryFrom($datatable);
        return $query->getResponse();
    }
    
    /**
     * Displays an existing region entity.
     *
     * @Route("/show", name="region_show", options={"expose"=true})
     * @Method({"GET"})
     */
    public function showAction(Request $request)
    {
        // ...
    }
    
    /**
     * Displays a form to add an existing region entity.
     *
     * @Route("/new", name="region_new", options={"expose"=true})
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        return new Response('new');
    }
    
    /**
     * Displays a form to edit an existing region entity.
     *
     * @Route("/{id}/edit", name="region_edit", options={"expose"=true})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Region $user)
    {
        // ...
    }
    
    /**
     * Displays a form to delete an existing region entity.
     *
     * @Route("/{id}/delete", name="region_delete", options={"expose"=true})
     * @Method({"GET", "POST"})
     */
    public function deleteAction(Request $request, Region $user)
    {
        // ...
    }
}
