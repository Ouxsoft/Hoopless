<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Example;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class ReactNativeWebView.
 */
class ReactNativeWebView extends AbstractElement
{
    public function onRender()
    {
        if (
            'true' == $this->getArgByName('initiate')
            && !empty($this->getArgByName('object'))
        ) {
            $object = $this->getArgByName('object'); // escape JSON

            return "<script>
                window.ReactNativeWebView.postMesage({$object}, '*');
            </script>".$this->xml;
        }

        return $this->xml;
    }
}
