<?php
/**
 * This file is part of the Hoopless package.
 *
 * (c) Ouxsoft <contact@Ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Element;

use Ouxsoft\PHPMarkup\Element\AbstractElement;

/**
 * Class Variable
 * @package PHPMarkup\Modules
 */
class Variable extends AbstractElement
{

    /**
     * Parses and calls other specialized format methods
     *
     * @param string $format
     * @return mixed
     */
    public function format(string $format)
    {

        // set format function and parameters
        preg_match('/(?<function>\w+)\((?<parameters>[^)]+)/', $format, $matches);
        $function = $matches['function'];
        $parameters = explode(',', $matches['parameters']);

        // sanitize each parameter
        foreach ($parameters as &$parameter) {
            // TODO: lookup and replace variables
            $parameter = trim($parameter, '\'');
        }

        $value = $this->getVariable();

        if (!method_exists($this, $function)) {
            return false;
        }

        // call specified function
        switch ($function) {
            case 'substr':
                return $this->substr($value, $parameters);
                break;
            case 'str_replace':
                return $this->str_replace($value, $parameters);
                break;
        }

        return false;
    }

    /**
     * Sub string replace
     *
     * @param string $string
     * @param array $parameters
     * @return string
     */
    private function substr(string $string, array $parameters): string
    {
        return substr($string, $parameters[0], $parameters[1]);
    }

    /**
     * String replace
     *
     * @param string $string
     * @param array $parameters
     * @return string
     */
    private function str_replace(string $string, array $parameters): string
    {
        return str_replace($parameters[0], $parameters[1], $string);
    }

    /**
     * Get variable named
     *
     * @param string $name
     * @param string $tag
     * @return mixed|null
     */
    private function getVariableFromAncestor(string $name, ?string $tag = '*'): ?string
    {
        foreach ($this->ancestors as $ancestor) {
            if (array_key_exists($name, $ancestor['properties']) && (($tag == '*') || ($tag == $ancestor['tag']))) {
                return $ancestor['properties'][$name];
            }
        }
        return null;
    }

    /**
     * on render call
     *
     * @return string
     */
    public function onRender(): string
    {
        $name = $this->getArgByName('name') ?? '';
        $source = $this->getArgByName('source') ?? '';

        // get variable
        switch ($source) {
            case 'get':
                $variable = array_key_exists($name, $_GET) ? (string) $_GET[$name] : '';
                $variable = htmlspecialchars($variable);
                break;
            case 'post':
                $variable = array_key_exists($name, $_POST) ? (string) $_POST[$name] : '';
                $variable = htmlspecialchars($variable);
                break;
            case 'parent':
            case 'ancestor':
            default:
                $tag = $this->getArgByName('tag') ?? '*';
                $variable = $this->getVariableFromAncestor($name, $tag);
                break;
        }

        // TODO for some reason first get variable name contains a "?" fix.

        if ($variable === null) {
            return '<!-- Variable "' . $this->getArgByName('name') . '" Not Found -->';
        }

        if (isset($this->format)) {
            return $this->format($this->name, $this->format);
        }

        $variable = htmlentities($variable, ENT_QUOTES);

        return $variable;
    }
}
