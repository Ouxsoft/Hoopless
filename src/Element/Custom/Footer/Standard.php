<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Footer;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class Standard
 * @package LHTML\Element\Custom\Footer
 */
class Standard extends AbstractElement
{
    public function onRender()
    {
        $year = date('Y');

        return <<<HTML
<!-- Footer -->
<footer class="bg-dark mt-5">
    <div class="container pt-5 pb-3">            
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3">
               <img src="/assets/images/ouxsoft/logo/white-transparent-bg.png" width="120" class="brand align-top m-auto" alt="Ouxsoft"/>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <nav class="nav flex-column ">
                </nav>
            </div>
            
            <div class="col-sm-6 col-md-4 col-lg-3 text-right">
                <nav class="nav flex-column ">
                    <a href="/help" class="nav-item nav-link text-white-50">Website Editing Guide</a>
                </nav>
            </div>        
            <div class="col-sm-6 col-md-4 col-lg-3 text-right">
                <nav class="nav flex-column ">
                    <a href="https://github.com/Ouxsoft" class="nav-item nav-link text-white-50">                    
                        <i class="fab fa-github fa-2x"></i>
                    </a>
                </nav>
            </div>            
        </div>
        <div class="col-12 text-center">
            <hr class="mt-5 mb-3"/>
            <span class="text-white-50">
            &copy; {$year} Ouxsoft. All Rights Reserved.
            </span>
        </div>
    </div>
    <div class="clearfix"></div>
</footer>

<script src="/assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap/bootstrap.min.js"></script>

HTML;
    }
}
