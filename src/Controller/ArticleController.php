<?php
/**
 * Created by PhpStorm.
 * User: orollet
 * Date: 26/07/2018
 * Time: 09:38
 */

namespace App\Controller;


use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @param ArticleRepository $repository
     * @return Response
     */
    public function homepage(ArticleRepository $repository)
    {
        //$repository = $em->getRepository(Article::class);
        $articles = $repository->findAllPublishedOrderedByNewest();
        return $this->render('article/homepage.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     * @param Article $article
     * @return Response
     */
  //  public function show($slug, MarkdownInterface $markdown, AdapterInterface $cache, EntityManagerInterface $em){
        public function show(Article $article){

       // $repository = $em->getRepository(Article::class);
        /** @var Article $article */
     //   $article = $repository->findOneBy(['slug' => $slug]);
        if (!$article) {
            throw $this->createNotFoundException(sprintf('No article for slug "%s"', $slug));
        }
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];

        //dump($slug, $this);
       /* $articleContent = <<<EOF
Spicy **jalapeno bacon** ipsum dolor amet veniam shank in dolore. Ham hock nisi landjaeger cow,
                                    lorem proident [beef ribs](https://bacanipsum.com/) aute enim veniam ut cillum pork chuck picanha. Dolore reprehenderit
                                    labore minim pork belly spare ribs cupim short loin in. Elit exercitation eiusmod dolore cow
                                    **turkey** shank eu pork belly meatball non cupim.
                                     
Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur
                                    laboris sunt venison, et laborum dolore minim non meatball. Shankle eu flank aliqua shoulder,
                                    capicola biltong frankfurter boudin cupim officia. Exercitation fugiat consectetur ham. Adipisicing
                                    picanha shank et filet mignon pork belly ut ullamco. Irure velit turducken ground round doner incididunt
                                    occaecat lorem meatball prosciutto quis strip steak.

Meatball adipisicing ribeye bacon strip steak eu. Consectetur ham hock pork hamburger enim strip steak
                                    mollit quis officia meatloaf tri-tip swine. Cow ut reprehenderit, buffalo incididunt in filet mignon
                                    strip steak pork belly aliquip capicola officia. Labore deserunt esse chicken lorem shoulder tail consectetur
                                    cow est ribeye adipisicing. Pig hamburger pork belly enim. Do porchetta minim capicola irure pancetta chuck
                                    fugiat.

Sausage tenderloin officia jerky nostrud. Laborum elit pastrami non, pig kevin buffalo minim ex quis. Pork belly
                                    pork chop officia anim. Irure tempor leberkas kevin adipisicing cupidatat qui buffalo ham aliqua pork belly
                                    exercitation eiusmod. Exercitation incididunt rump laborum, t-bone short ribs buffalo ut shankle pork chop
                                    bresaola shoulder burgdoggen fugiat. Adipisicing nostrud chicken consequat beef ribs, quis filet mignon do.
                                    Prosciutto capicola mollit shankle aliquip do dolore hamburger brisket turducken eu.

Do mollit deserunt prosciutto laborum. Duis sint tongue quis nisi. Capicola qui beef ribs dolore pariatur.
                                    Minim strip steak fugiat nisi est, meatloaf pig aute. Swine rump turducken nulla sausage. Reprehenderit pork
                                    belly tongue alcatra, shoulder excepteur in beef bresaola duis ham bacon eiusmod. Doner drumstick short loin,
                                    adipisicing cow cillum tenderloin.

EOF; */

    /*    $item = $cache->getItem('markdown_'.md5($articleContent));
        if (!$item->isHit()){
            $item->set($markdown->transform($articleContent));
            $cache->save($item);
        }

        $articleContent = $item->get(); */

        return $this->render('article/show.html.twig', [
           // 'title' => ucwords(str_replace('-', ' ', $slug)),
           // 'articleContent'=>$articleContent,
           // 'slug' => $slug,
            'article' => $article,
            'comments' => $comments,
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     * @param Article $article
     * @param LoggerInterface $logger
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function toggleArticleHeart(Article $article, LoggerInterface $logger, EntityManagerInterface $em)
    {
        $article->incrementHeartCount();
        $em->flush();
        $logger->info('Article is being hearted!');
        return new JsonResponse(['hearts' => $article->getHeartCount()]);
    }
}