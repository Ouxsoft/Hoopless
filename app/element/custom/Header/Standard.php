<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Header;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class Standard
 * @package LHTML\Element\Custom\Header
 */
class Standard extends AbstractElement
{
    public $separator = '/';

    /**
     * Renders a breadcrumb trail for the current page
     *
     * TODO: get current page
     *
     * @return mixed|string
     */
    public function getBreadcrumbs()
    {
        // skip breadcrumb on front page
        if ($this->getArgByName('frontpage')) {
            return '';
        }

        $pages = [
            [
                'title' => 'Home',
                'href' => '/'
            ]
        ];

        $out = '<!-- Breadcrumb -->' . PHP_EOL;
        $out .= '<nav class="breadcrumb" aria-label="breadcrumb">';
        $out .= '<div class="container">';
        $out .= '<ol class="m-0 p-0">';
        foreach ($pages as $page) {
            $out .= '<li class="breadcrumb-item active" aria-current="page">';
            $out .= '<a href="' . $page['href'] . '" class="pl-2 pr-2">';
            $out .= $page['title'];
            $out .= '</a>';
            $out .= '<span class="separator pl-2 pr-2">' . $this->separator . '</span> ';
            $out .= '</li>';
        }
        $out .= '</ol>';
        $out .= '</div>';
        $out .= '</nav>';
        return $out;
    }

    public function getNavbar()
    {
        return <<<HTML
<nav class="navbar navbar-expand-lg navbar-dark bg-dark "> 
    
    <div class="container">
    <a class="navbar-brand d-block d-lg-none" href="/">
        <img src="/assets/images/ouxsoft/logo/inline-transparent-bg.png" width="120" class="brand align-top" alt="Ouxsoft"/>
    </a> 

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">    
            <ul class="navbar-nav pull-sm-left">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Projects
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="https://github.com/Ouxsoft/PHPMarkup">PHPMarkup</a>
                        <a class="dropdown-item" href="https://github.com/Ouxsoft/LHTML">LHTML</a>
                        <a class="dropdown-item" href="https://github.com/Ouxsoft/Hoopless">Hoopless</a>
                    </div>
                </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-logo mx-auto">
                <li class="nav-item">
                    <a class="navbar-brand d-none d-lg-block" href="/">
                        <img src="/assets/images/Ouxsoft/logo/inline-transparent-bg.png" width="120" class="brand align-top" alt="Ouxsoft"/>
                    </a> 
                </li>       
            </ul>
        
            <ul class="navbar-nav pull-sm-right">
                <li class="nav-item">
                    <a class="nav-link" href="/news">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/Ouxsoft">GitHub</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
HTML;
    }

    public function onRender()
    {
        return <<<HTML
<!-- Header -->
<header>
    {$this->getNavbar()}
    {$this->getBreadcrumbs()}
</header>
HTML;
    }
}
