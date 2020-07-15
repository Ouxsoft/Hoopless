<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Partials;

use LivingMarkup\Element\AbstractElement;

/**
 * Class HeaderDefault
 * @package LivingMarkup\Modules\Custom\Partials
 */
class HeaderDefault extends AbstractElement
{
    public function onRender()
    {
        return <<<HTML
<header>    
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav  mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/help">Help <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
    
            <a class="navbar-brand mx-auto" href="/">
                <img src="/assets/images/ouxsoft/logo/white-transparent-bg.png" width="40" class="brand align-top" alt="Ouxsoft"/>
            </a>       
                    
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sign In</a>
                    </li>
                </ul>
            </div>    
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
        </div>
    </nav>        
</header>

HTML;
    }
}
