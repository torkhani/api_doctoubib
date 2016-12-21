<?php

namespace WsBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Config\Definition\Exception\Exception;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use FOS\RestBundle\View\View;

/**
 * Class SponsorshipController
 *
 * @Rest\RouteResource("Sponsorship")
 */
class SponsorshipController extends FOSRestController
{
    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     *
     *
     * @ApiDoc(
     *     section="Sponsorship",
     * )
     */
    public function getAction($id)
    {
        //return $this->render('', array('name' => $id));
    }

    /**
     * @ApiDoc(
     *     section = "Sponsorship"
     * )
     */
    public function cgetAction()
    {
        //
    }

    /**
     * @param Request $request
     *
     * @ApiDoc(
     *     section="Sponsorship"
     * )
     *
     * @Rest\QueryParam(name="username", nullable=false, description="Firstname & Lastname")
     * @Rest\QueryParam(name="email", nullable=true, description="Email")
     * @Rest\QueryParam(name="doctor_name", nullable=false, description="Doctor name")
     * @Rest\QueryParam(name="region", nullable=true, description="Region ID")
     *
     * @Rest\View()
     *
     * @return View
     */
    public function postAction(Request $request)
    {
        try {
            $params = $request->request->all();
            $this->get('doctoubib_models.sponsorship')->save($params);
        } catch (Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        return View::create(null, 200);
    }
}