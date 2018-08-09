<?php

namespace App\DataFixtures;


use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends BaseFixture
{
    /*   public function load(ObjectManager $manager)
      {
          // $product = new Product();
          // $manager->persist($product);
         $article = new Article();
          $article->setTitle('Why Asteroids Taste Like Bacon')
              ->setSlug('why-asteroids-taste-like-bacon-'.rand(100, 999))
              ->setContent(<<<EOF
  Spicy **jalapeno bacon** ipsum dolor amet veniam shank in dolore. Ham hock nisi landjaeger cow,
  lorem proident [beef ribs](https://baconipsum.com/) aute enim veniam ut cillum pork chuck picanha. Dolore reprehenderit
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
  EOF
              );
          // publish most articles
          if (rand(1, 10) > 2) {
              $article->setPublishedAt(new \DateTime(sprintf('-%d days', rand(1, 100))));
          }
          $article->setAuthor('Mike Ferengi')
              ->setHeartCount(rand(5, 100))
              ->setImageFilename('asteroid.jpeg')
          ;
  //var_dump($article);
          $manager->persist($article);
          $manager->flush();
    } */

    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 10, function(Article $article, $count) use ($manager) {

            //$article = new Article();
            $article->setTitle('Why Asteroids Taste Like Bacon')
                ->setSlug('why-asteroids-taste-like-bacon-' . rand(100, 999))
                ->setContent(<<<EOF
Spicy **jalapeno bacon** ipsum dolor amet veniam shank in dolore. Ham hock nisi landjaeger cow,
lorem proident [beef ribs](https://baconipsum.com/) aute enim veniam ut cillum pork chuck picanha. Dolore reprehenderit
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
EOF
                );
            // publish most articles
            if (rand(1, 10) > 2) {
                $article->setPublishedAt(new \DateTime(sprintf('-%d days', rand(1, 100))));
            }
            $article->setAuthor('Mike Ferengi')
                ->setHeartCount(rand(5, 100))
                ->setImageFilename('asteroid.jpeg')
                ->setCreatedAt(new \DateTime())
                ->setUpdatedAt(new \DateTime());
           // ->setCrea(new \DateTime(sprintf('-%d days', rand(1, 100))));  //Faire createdAt

         /*   $comment1 = new Comment();
            $comment1->setAuthorName("Mike Farengi");
            $comment1->setContent("I ate a normal rock once. It did NOT 22 taste like bacon!");
            $comment1->setCreatedAt(new \DateTime());
            $comment1->setUpdatedAt(new \DateTime());
            $comment1->setArticle($article);
           // $article->addComment($comment1);
            $manager->persist($comment1);

            $comment2 = new Comment();
            $comment2->setAuthorName("Mike Farengi");
            $comment2->setContent("Woohoo! I'm going on an 33 all-asteroid diet!");
            $comment2->setCreatedAt(new \DateTime());
            $comment2->setUpdatedAt(new \DateTime());
            $comment2->setArticle($article);
          //  $article->addComment($comment2);
            $manager->persist($comment2);*/
        });


        //$manager->persist($article);
        $manager->flush();
    }


}
