<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Partial;

use LivingMarkup\Element\AbstractElement;

class Alerts extends AbstractElement
{
    public function onRender()
    {
        switch ($this->getArgByName('type')) {
            case 'success':
                $class = 'alert-success';
                break;
            case 'warning':
                $class = 'alert-warning';
                break;
            default:
                $class = 'alert-info';
                break;
        }
        return <<<HTML
<!-- Alert -->
<div class="alert {$class}" role="alert">
    {$this->innerText()}
</div>
HTML;
    }
}
