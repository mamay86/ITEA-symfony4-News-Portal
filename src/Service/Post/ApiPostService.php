<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Post;

use App\Api\Document\Document;
use App\Api\Document\DocumentBuilder;
use App\Api\Transformer\PostResourceTransformer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Provides post resource for using in API.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class ApiPostService extends PostService implements PostServiceInterface
{

    /**
     * {@inheritdoc}
     */
    public function findOne(int $id): Document
    {
        $post = parent::findOne($id);

        return DocumentBuilder::getInstance(new PostResourceTransformer())
            ->setEntity($post)
            ->getDocument()
            ;
    }
    /**
     * {@inheritdoc}
     */
    public function create(array $data): Document
    {
        $post = parent::create($data['attributes']);

        return DocumentBuilder::getInstance(new PostResourceTransformer())
            ->setEntity($post)
            ->getDocument()
            ;
    }
    /*
     * @todo Move this logic to resource transformer class
     */
    /*private function entityToResource(\App\Entity\Post $entity): Post
    {
        $resource = new Post();
        $resource->setId($entity->getId());
        $resource->setCategory($entity->getCategory()->getTitle());
        $resource->setTitle($entity->getTitle());
        $resource->setContent($entity->getBody());
        $resource->setCreatedAt($entity->getCreatedAt());
        $resource->setUpdatedAt($entity->getUpdatedAt());
        return $resource;
    }*/
    /*
     * {@inheritdoc}
     */

    /*public function edit(int $id, array $data): Post
    {
        $post = $this->postRepository->findOne($id);
        if (!$post) {
            throw new NotFoundHttpException(\sprintf('Post with ID %d not found', $id));
        }
        $post->setTitle($data['title']);
        $post->setBody($data['content']);
        $this->postRepository->save($post);
        return $this->entityToResource($post);
    }*/

    /*
     * {@inheritdoc}
     */

    /*public function getAll()
    {
        $resPosts = [];
        $posts = parent::getAll();
        foreach ($posts as $post) {
            $resPosts[] = $this->entityToResource($post);
        }
        return $resPosts;
    }*/
}
