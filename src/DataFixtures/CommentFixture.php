<?php

namespace App\DataFixtures;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Comment;
use App\Entity\Article;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class CommentFixture extends BaseFixture implements DependentFixtureInterface
{
   /* public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        //$manager->flush();
    }*/

    /**
     * @return array
     */
    public function getDependencies()
    {
        return [ArticleFixtures::class];
    }

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Comment::class, 30, function(Comment $comment) {
            $comment->setContent(
                $this->faker->boolean ? $this->faker->paragraph : $this->faker->sentences(2, true)
            );
            $comment->setAuthorName($this->faker->name);
            $comment->setCreatedAt($this->faker->dateTimeBetween('-1 months', '-1 seconds'));
            //$comment->setCreatedAt(new \DateTime())
            $comment->setUpdatedAt(new \DateTime());
            $comment->setIsDeleted($this->faker->boolean(20));
            //$comment->setArticle($this->getReference(Article::class.'_'.$this->faker->numberBetween(0, 9)));
            $comment->setArticle($this->getRandomReference(Article::class));

        });
        $manager->flush();
    }
}
