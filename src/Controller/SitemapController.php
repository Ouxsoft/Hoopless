<?php

namespace App\Controller;

use DOMDocument;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    private $siteURL = 'https://ouxsoft.com';

    private $sitemaps = [
        'sitemap.pages.xml',
        'sitemap.blogs.xml',
        'sitemap.news.xml',
    ];

    /**
     * Generates the root sitemap which contains links to sub urlset sitemaps.
     *
     * @Route("/sitemap.xml", priority=5, name="sitemap", methods={"GET"})
     */
    public function sitemapIndex(): Response
    {
        $xml = new DOMDocument('1.0', 'UTF-8');
        $xml->formatOutput = true;
        $xml->preserveWhiteSpace = false;
        $xmlUrlSet = $xml->createElement('sitemapindex');
        $xmlUrlSet->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $xmlUrlSet->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $xmlUrlSet->setAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');
        $xml->appendChild($xmlUrlSet);

        foreach ($this->sitemaps as $sitemap) {
            $sitemap = <<<XML
            <sitemap>
                <loc>{$this->siteURL}/{$sitemap}</loc>
                <lastmod>2020-01-01T10:00:00+02:00</lastmod>
            </sitemap>
            XML;

            $f = $xml->createDocumentFragment();
            $f->appendXML($sitemap);
            $xml->documentElement->appendChild($f);
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml');
        $response->setContent($xml->saveXML());

        return $response;
    }

    /**
     * @Route("/sitemap.pages.xml", priority=5, name="pagesUrlSet", methods={"GET"})
     */
    public function pagesUrlSet(): Response
    {
        $xml = new DOMDocument('1.0', 'UTF-8');
        $xml->formatOutput = true;
        $xml->preserveWhiteSpace = false;
        $xmlUrlSet = $xml->createElement('urlset');
        $xmlUrlSet->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $xmlUrlSet->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $xmlUrlSet->setAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');
        $xml->appendChild($xmlUrlSet);

        // todo get all pages
        $pages = [
            '',
        ];
        foreach ($pages as $page) {
            $url = <<<XML
            <url>
                <loc>{$this->siteURL}/{$page}</loc>
                <lastmod>2020-01-01T10:00:00+02:00</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.5</priority>
            </url>
            XML;

            $f = $xml->createDocumentFragment();
            $f->appendXML($url);
            $xml->documentElement->appendChild($f);
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml');
        $response->setContent($xml->saveXML());

        return $response;
    }
}
