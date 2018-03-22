<?php
 
namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class GitHutController extends Controller{
    
    /**
     * @Route("/{username}", name="githut", defaults={"username": "jacques25"})
     */
    public function githutAction(Request $request, $username)
    {
         $this->get('github_api')->getRepos($username);
     
         return $this->render('githut/index.html.twig', [
                    'username' => $username,
                   
        ]);
    }
    
    
    /**
     * @Route("/profile/{username}", name="profile")
     */
    public function profileAction(Request $request, $username) {
        
        $profileData = $this->get('github_api')->getProfile($username);
        return $this->render('githut/profile.html.twig', $profileData);
    }
    
    /**
     * @Route("/repos/{username}", name="repos")
     */
    public function reposAction(Request $request, $username) {
        
        $reposData = $this->get('github_api')->getRepos($username);
        return $this->render('githut/repos.html.twig', $reposData);
    }


}
