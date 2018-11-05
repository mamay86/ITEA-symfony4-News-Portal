<?php
namespace App\Tests\Service\Post;
use App\Entity\Post;
use App\Repository\CategoryRepository;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\PostRepository;
use App\Repository\PostRepositoryInterface;
use App\Service\Post\PostService;
use App\Service\Post\PostServiceInterface;
use PHPUnit\Framework\TestCase;
/**
 * Test case for post service.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @covers \App\Service\Post\PostService
 */
final class PostServiceTest extends TestCase
{
    private $service;
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->service = new PostService(
            $this->getCategoryRepository(),
            $this->getPostRepository()
        );
    }
    public function testInstanceOfPostServiceInterface()
    {
        self::assertInstanceOf(PostServiceInterface::class, $this->service);
    }
    public function testFindOne()
    {
        $postRepository = $this->getPostRepository();
        $expected = new Post();
        $postRepository->expects(self::once())
            ->method('findOne')
            ->willReturn($expected)
        ;
        $service = new PostService(
            $this->getCategoryRepository(),
            $postRepository
        );
        $actual = $service->findOne(0);
        self::assertEquals($expected, $actual);
    }
    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @expectedExceptionMessage Post with ID 1 not found
     */
    public function testFindOneException()
    {
        $postRepository = $this->getPostRepository();
        $postRepository->expects(self::once())
            ->method('findOne')
            ->willReturn(null)
        ;
        $service = new PostService(
            $this->getCategoryRepository(),
            $postRepository
        );
        $service->findOne(1);
    }
    private function getCategoryRepository(): CategoryRepositoryInterface
    {
        return $this->getMockBuilder(CategoryRepository::class)
            ->disableOriginalConstructor()
            ->getMock()
            ;
    }
    private function getPostRepository(): PostRepositoryInterface
    {
        return $this->getMockBuilder(PostRepository::class)
            ->disableOriginalConstructor()
            ->getMock()
            ;
    }
}