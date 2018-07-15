<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 12.07.2018
 * Time: 12:33
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;
use AppBundle\Entity\LoginDate;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class UserController extends FOSRestController
{

    /**
     * @ApiDoc(
     *
     *resource=true,
     *description = "Get all login from database",
     *      statusCodes={
     *          200="Returned when successful",
     *          404="Returned when the login is not found",
     *          500="Internal Server Error",
     *            },
     *
     *
     *
     *            section = "Get all"
     *       )
     * /
     *
     *
     * /**
     * @Rest\Get("api/user")
     */
    public function getAction()
    {

        $restresult = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }


    /**
     * @ApiDoc(
     *
     *resource=true,
     *description = "Get all login from database",
     *      statusCodes={
     *          200="Returned when successful",
     *          404="Returned when the login is not found",
     *          500="Internal Server Error",
     *            },
     *
     *    requirements = {
     *{"name"="id", "dataType"="int", "requirement"="\w+", "description" = "ID login"}
     *            },
     *
     *            section = "Get ID login"
     *       )
     * /
     *
     *
     * /**
     * @Rest\Get("api/user/{id}")
     */
    public function idAction($id)
    {
        $singleresult = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        if ($singleresult === null) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        }
        return $singleresult;
    }


    /**
     * @ApiDoc(
     *
     *resource=true,
     *description = "Get all login from database",
     *      statusCodes={
     *          200="Returned when login visitation add successfully",
     *          404="Returned when the login is not found for visitation date registration ",
     *          500="Internal Server Error",
     *            },
     *
     *requirements = {
     *{"name"="login", "dataType"="string", "requirement"="/?login=\+w", "description" = "login in database"}
     *            },
     *
     *            section = "visitation date registration"
     *       )
     * /
     *
     * /**
     * @Rest\Post("api/date_registration/")
     */


    public function loginAction(Request $request)
    {


        $data = new LoginDate();
        $user = new User();
        $login = $request->get('login');
        $sn = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->findBy(array('login' => $login));

        if (empty($user)) {
            return new View("login not found for visitation date registration ", Response::HTTP_NOT_FOUND);
        } else {

            $data->setIdLogin($user[0]->getId());

            $data->setDate(date_create(date("Y-m-d H:i:s")));

            $sn->persist($data);
            $sn->flush();

            return new View("login visitation add successfully", Response::HTTP_OK);
        }


    }


    /**
     * @ApiDoc(
     *
     *resource=true,
     *description = "get date login visitation",
     *      statusCodes={
     *          200="Returned when successful",
     *          404="Returned when the login is not found",
     *          500="Internal Server Error",
     *            },
     *
     *
     *
     *     requirements = {
     *                {"name"="start", "dataType"="datetime","requirement"="/?start=/^[\d]{4}-[\d]{2}-[\d]{2} [\d]{2}:[\d]{2}:[\d]{2}$/", "description" = "first date diapason post through GET"},
     *                {"name"="finish", "dataType"="datetime","requirement"="/?last=/^[\d]{4}-[\d]{2}-[\d]{2} [\d]{2}:[\d]{2}:[\d]{2}$/", "description" = "second date diapason through GET"}
     *
     *
     *            },
     *
     *
     *
     *
     *
     *            section = "get date"
     *       )
     * /
     *
     *
     *
     *
     * /**
     * @Rest\Get("api/date/")
     */

    public function dateRegisterAction(Request $request)
    {


        $repository = $this->getDoctrine()->getRepository('AppBundle:LoginDate');

        $start = $request->get('start');

        $last = $request->get('last');

        if (empty($start) || empty($last)) {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }

        $query = $repository->createQueryBuilder('d')
            ->select(' d.idLogin,u.login,MAX(d.date) AS date')
            ->from('AppBundle\Entity\User', 'u')
            ->where('u.id=d.idLogin and d.date between :start and :last')
            ->setParameter('start', $start)
            ->setParameter('last', $last)
            ->groupBy('d.idLogin')
            ->orderBy('date', 'ASC')
            ->getQuery();

        $result = $query->getResult();

        return $result;


    }


}