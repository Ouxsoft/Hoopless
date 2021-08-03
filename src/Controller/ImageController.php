<?php

namespace App\Controller;

use App\Model\Image;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageController
{
    /**
     * @Route("/assets/images/{url}", name="indexAction", requirements={"url"=".+"})
     */
    public function indexAction($url) : Response
    {

        $response = new Response();

        $image = new Image();
        $image->loadByURL("/assets/images/{$url}");


        // send cached image
//        if ($resource == $this->cache_filepath) {
//            $this->sendCached();
//        }


        // load and resize file
        if (! $image->load() || ! $image->resize()) {
            // catch throws instead
            // if cannot load file send empty
            $response->setStatusCode(404);
            return $response;
        }

        $response->headers->set('Cache-Control', 'private');

        switch ($image->getFileExtension()){
            case 'gif':
                $response->headers->set('Content-Type', 'image/gif');
                $response->sendHeaders();
                $response->setContent(
                    imagegif($image->image, null)
                );
                break;
            case 'png':
                $response->headers->set('Content-Type', 'image/png');
                $response->sendHeaders();
                $response->setContent(
                    imagepng($image->image, null, 9)
                );
                break;
            case 'jpeg':
            case 'jpg':
                $response->headers->set('Content-Type', 'image/jpeg');
            $response->sendHeaders();
                $response->setContent(
                    imagejpeg($image->image, null, 100)
                );
                break;
            default:
        }

        return $response;
    }
}