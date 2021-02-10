<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\NewsRepository;
use App\Entity\News;

class NewsController extends AbstractController
{
    /**
     * @Route("/", name="news")
     */
    public function index(NewsRepository $newsRepository): Response
    {
    	// $news=$newsRepository->findAll();

    	$lastNews=$newsRepository->findLastNews(4);
    	// dd($lastNews);

        return $this->render('news/index.html.twig', [
            'lastNews' => $lastNews,
        ]);
    }

    /**
     * Affichage de l'article complet
     * @Route("/news/{id}", name="news_read")
     * 
     * @return void
     */
    public function read(News $news)
    {
    	// dd($news);

    	return $this->render('news/read.html.twig', [
            'news' => $news,
        ]);
    }


}
