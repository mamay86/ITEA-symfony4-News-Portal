<?php

/*
 * This file is part of the "Project Stat" project.
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Command;

use App\Entity\Post;
use App\Repository\PostRepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command for generating fake posts for development purposes.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class PostsGeneratorCommand extends Command
{
    private $repository;
    public function __construct(PostRepositoryInterface $repository, string $name = null)
    {
        parent::__construct($name);
        $this->repository = $repository;
    }
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:posts:generate')
            ->setDescription('Generate fake posts for development purposes.')
            ->addArgument(
                'count',
                InputArgument::OPTIONAL,
                'Set count of posts to generate',
                1
            )
        ;
    }
    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $count = $input->getArgument('count');
        $faker = \Faker\Factory::create();
        $posts = [];

        for ($i = 0; $i < $count; $i++) {
            $post = new Post();
            $post
                ->setCategoryId($faker->numberBetween(1, 3))
                ->setTitle($faker->sentence)
                ->setBody($faker->text)
            ;
            $posts[] = $post;
        }
        $this->repository->saveAll($posts);
        $output->writeln(\sprintf('%d posts were successfully created!', $count));
    }
}
