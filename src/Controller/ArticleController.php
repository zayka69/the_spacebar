<?php
/**
 * Created by PhpStorm.
 * User: orollet
 * Date: 26/07/2018
 * Time: 09:38
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    /**
     * @Route("/")
     */
    public function homepage(){
        return new Response("Ma 1ère page");
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug){
        return new Response(sprintf("Future page: %s",$slug));
    }
}