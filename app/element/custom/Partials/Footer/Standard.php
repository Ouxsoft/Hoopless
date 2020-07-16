<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Partials\Footer;

use LivingMarkup\Element\AbstractElement;

/**
 * Class HeaderDefault
 * @package LivingMarkup\Modules\Custom\Partials
 */
class Standard extends AbstractElement
{
    public function onRender()
    {
        $year = date('Y');

        return <<<HTML
        <footer class="bg-dark footer">
            <div class="container pt-5">            
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                       <img src="/assets/images/ouxsoft/logo/white-transparent-bg.png" width="120" class="brand align-top" alt="Ouxsoft"/>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a href="/help">Website Editing Guide</a>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <hr/>
                    <span class="text-muted">
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
