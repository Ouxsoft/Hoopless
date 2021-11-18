<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element\Widget;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class Hyperlink
 *
 * Replaces <a> tag links on website
 *
 */
class Code extends AbstractElement
{
    private $code;

    public function onLoad()
    {
        /*
        $DOM->addStyle('/assets/css/codemirror/codemirror.css');
        $DOM->addScript('/assets/js/codemirror/codemirror.js');
        $DOM->addScript('
      window.onload = function() {
        editor = CodeMirror(document.getElementById("code"), {
          mode: "text/html",
          extraKeys: {"Ctrl-Space": "autocomplete"},
          value: document.documentElement.innerHTML
        });
      };');
        */
    }

    public function onRender()
    {

        // encode characters
        $this->code = $this->xml;

        if (preg_match('/^(\s)*/', $this->code, $matches)) {
            // count
            $indent_count = count(str_split($matches[0])) - 1;
            $new_code = '';
            foreach (preg_split("/((\r?\n)|(\r\n?))/", $this->code) as $line) {
                $new_code .= substr_replace($line, '', 0, $indent_count) . PHP_EOL;
            }
            $this->code = $new_code;
        }
        $this->code = trim($this->code);

        $this->code = htmlspecialchars($this->code, ENT_QUOTES);


        return $this->view->render('code.html.twig', [
            'code' => $this->code
        ]);
    }
}
