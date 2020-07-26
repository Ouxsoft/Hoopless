<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LHTML\Element\Custom\Example;

use LivingMarkup\Element\AbstractElement;

class ReactNativeWebView extends AbstractElement
{
    public function onRender()
    {
        if ($this->args['initiate'] == "true" && !empty($this->args['object'])) {
            $object = $this->args['object']; // escape JSON
            return "<script>
                window.ReactNativeWebView.postMesage({$object}, '*');
            </script>" . $this->xml;
        }

        return $this->xml;
    }
}
