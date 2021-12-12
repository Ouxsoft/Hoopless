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

class Alert extends AbstractElement
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
