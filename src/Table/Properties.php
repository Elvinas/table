<?php
namespace Jupitern\Table;

class Properties
{
	private $properties;

    /**
     * @param $property
     * @param $value
     * @return $this
     */
    public function add($property, $value)
	{
		$this->properties[$property] = $value;

		return $this;
	}

    /**
     * @param $properties
     * @return $this
     */
    public function addAll($properties)
	{
		if (is_array($properties)) {
			$this->properties = array_merge((array)$this->properties, $properties);
		}

		return $this;
	}

    /**
     * @param $elem
     * @param $template
     * @return string
     */
    public function render($template)
	{
		$output = '';
		foreach ((array)$this->properties as $prop => $val) {
			$output .= str_replace(['{prop}', '{val}'], [$prop, $val], $template);
		}

		return $output;
	}

}