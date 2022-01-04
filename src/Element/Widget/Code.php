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

class Code extends AbstractElement
{
    public function onLoad()
    {
        // todo handle multiple
        $this->javascripts->add('/assets/js/codemirror/codemirror.js');
        $this->javascripts->add('/assets/js/codemirror/xml.js');

        $this->stylesheets->add('/assets/css/codemirror/codemirror.css');
        $this->stylesheets->add('/assets/css/codemirror/dracula.css');

        $this->scripts->add("
            function qsa(sel) {
                return Array.apply(null, document.querySelectorAll(sel));
            }
            qsa('.codemirror-textarea').forEach(function (editorEl) {
                CodeMirror.fromTextArea(editorEl, {
                    lineNumbers: true,
                    styleActiveLine: true,
                    matchBrackets: true,
                    mode : 'xml',
                    htmlMode: true,
                    readOnly: 'nocursor',
                    theme: 'dracula'
                }).setSize('100%', 'auto');
            });
        ");
    }

    public function onRender()
    {
        // encode characters
        $html = $this->xml;

        if (preg_match('/^(\s)*/', $html, $matches)) {
            // count
            $indent_count = count(str_split($matches[0])) - 1;
            $new_code = '';
            foreach (preg_split("/((\r?\n)|(\r\n?))/", $html) as $line) {
                $new_code .= substr_replace($line, '', 0, $indent_count).PHP_EOL;
            }
            $html = $new_code;
        }
        $html = trim($html);

        $html = htmlspecialchars($html, ENT_QUOTES);

        return $this->view->render('/widget/code.html.twig', [
            'code' => $html,
            'demo' => $this->getArgByName('demo') ?? false,
        ]);
    }
}
