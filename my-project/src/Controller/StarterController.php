<?php
namespace App\Controller;
use App\Entity\Pokemon;
use App\Form\PokemonType;
use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/starter")
 */
class StarterController extends AbstractController
{
    /**
     * @Route("/", name="starter")
     */
    public function index()
    {
        $starter = $this->getDoctrine()-> getRepository(Pokemon::class)->findStarterID();
        return $this->render('starter/index.html.twig', ['starter' => $starter]);
    }
}
?>