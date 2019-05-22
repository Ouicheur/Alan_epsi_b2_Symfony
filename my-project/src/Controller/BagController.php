<?php
namespace App\Controller;
use App\Entity\Soin;
use App\Repository\SoinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/bag", name="bag")
 */
class BagController extends AbstractController
{
    /**
     * @Route("/", name="bag_index", methods={"GET"})
     */
    public function index(SoinRepository $SoinRepository): Response
    {
        return $this->render('bag/index.html.twig', [
            'bag' => $SoinRepository->findAll(),
        ]);
    }
    /**
     * @Route("/id/{id}", name="bag_show", methods={"GET"})
     */
    public function show(Soin $soin): Response
    {
        return $this->render('bag/show.html.twig', [
            'soin' => $soin,
        ]);
    }
}

?>
