<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Api\Document;

use App\Api\Entity\EntityInterface;
use App\Api\Transformer\ResourceTransformerInterface;

/**
 * Builder for document. Build document from provided entity or entities
 * using given resource transformer instance.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class DocumentBuilder
{
    private $resourceTransformer;
    /**
     * @var Document
     */
    private $document;
    /**
     * Creates instance of builder and initializes document.
     *
     * @param ResourceTransformerInterface $resourceTransformer
     *
     * @return DocumentBuilder
     */
    public static function getInstance(ResourceTransformerInterface $resourceTransformer): self
    {
        $builder = new self($resourceTransformer);
        $builder->createDocument();

        return $builder;
    }
    public function __construct(ResourceTransformerInterface $resourceTransformer)
    {
        $this->resourceTransformer = $resourceTransformer;
    }
    public function createDocument(): self
    {
        $this->document = new Document();

        return $this;
    }
    public function setEntity(EntityInterface $entity): self
    {
        $resource = new Resource($this->resourceTransformer->getType());
        $resource->setId($entity->getId());
        $resource->setAttributes($this->resourceTransformer->getAttributes($entity));
        $this->document->setLinks($this->resourceTransformer->getLinks($entity));
        $this->document->setData($resource);

        return $this;
    }
    /**
     * @param EntityInterface[] $entities
     *
     * @return DocumentBuilder
     */
    public function setEntities($entities): self
    {
        $data = [];

        foreach ($entities as $entity) {
            $resource = new Resource($this->resourceTransformer->getType());
            $resource->setId($entity->getId());
            $resource->setAttributes($this->resourceTransformer->getAttributes($entity));
            $data[] = $resource;
        }
        $this->document->setData($data);
        $this->document->setLinks([]);

        return $this;
    }
    public function getDocument(): Document
    {
        return $this->document;
    }
}
