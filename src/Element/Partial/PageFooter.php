<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Partial;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class PageFooter
 */
class PageFooter extends AbstractElement
{
    public function onRender()
    {
        return $this->view->render('/page-footer.html.twig', [
            'site_name' =>  $_ENV['SITE_NAME'],
            'year' => date('Y')
        ]);
    }
}
