<?php

namespace Relaxsd\Stylesheets;

class Stylesheet
{

    /** @var Style[] */
    protected $styles = [];

    /**
     * Stylesheet constructor.
     *
     * @param Stylesheet|array $stylesheet
     */
    public function __construct($stylesheet = null)
    {
        $this->add($stylesheet);
    }

    /**
     * Adds a stylesheet to this stylesheet.
     * To create a copy, use the static merged() method instead.
     *
     * @param Stylesheet|array      $stylesheet
     * @param Stylesheet|array|null $_
     *
     * @return \Relaxsd\Stylesheets\Stylesheet
     */
    public function add($stylesheet, $_ = null)
    {
        foreach (func_get_args() as $stylesheet) {

            if (!isset($stylesheet)) continue;

            $styles = ($stylesheet instanceof Stylesheet)
                ? $stylesheet->styles
                : $stylesheet;

            foreach ($styles as $element => $style) {
                // Always add a copy of the style
                $this->addStyle($element, Style::style($style, true));
            }

        }

        return $this;
    }

    /**
     * @param  string     $element
     * @param Style|array $style
     *
     * @return $this
     */
    public function addStyle($element, $style)
    {
        if (array_key_exists($element, $this->styles)) {
            // Merge the style
            $this->styles[$element]->add($style);
        } else {
            // Add the style
            $this->styles[$element] = Style::style($style);
        }

        return $this;
    }

    /**
     * Gets all elements names that have styles
     *
     * @return string[]
     */
    public function getElements()
    {
        return array_keys($this->styles);
    }

    /**
     * @param string $element
     *
     * @return null|\Relaxsd\Stylesheets\Style
     */
    public function getStyle($element)
    {
        return $this->hasStyle($element)
            ? $this->styles[$element]
            : null;
    }

    /**
     * @param string $element
     *
     * @return null|\Relaxsd\Stylesheets\Style
     */
    public function hasStyle($element)
    {
        return array_key_exists($element, $this->styles);
    }

    /**
     * @param string     $element
     * @param string     $attribute
     * @param mixed|null $default
     *
     * @return null|\Relaxsd\Stylesheets\Style
     */
    public function getValue($element, $attribute, $default = null)
    {
        return ($style = $this->getStyle($element))
            ? $style->getValue($attribute, $default)
            : $default;
    }

    /**
     * @return \Relaxsd\Stylesheets\Style[]
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * Creates a copy of this object.
     * Nested Style objects will also be copied to new instances.
     *
     * @return \Relaxsd\Stylesheets\Stylesheet
     */
    public function copy()
    {
        return new static(array_map(function (Style $style) {
            return $style->copy();
        }, $this->styles));
    }

    /**
     * Scales all styles within this stylesheet.
     * To create a copy, use the static scaled() method instead.
     *
     * @param float      $factorH
     * @param float|null $factorV
     *
     * @return $this
     */
    public function scale($factorH, $factorV = null)
    {
        foreach ($this->styles as $styles) {
            $styles->scale($factorH, $factorV);
        }

        return $this;
    }

    /**
     * Returns a scaled copy of this stylesheet.
     *
     * @param Stylesheet|array $stylesheet
     * @param float            $factorH
     * @param float|null       $factorV
     *
     * @return $this
     */
    public static function scaled($stylesheet, $factorH, $factorV = null)
    {
        return (new static($stylesheet))->scale($factorH, $factorV);
    }

    /**
     * Returns a copy of a stylesheet
     *
     * @param Stylesheet|array      $stylesheet
     * @param Stylesheet|array|null $_
     *
     * @return \Relaxsd\Stylesheets\Stylesheet
     */
    public static function merged($stylesheet, $_)
    {
        $stylesheets = func_get_args();

        $stylesheet = array_shift($stylesheets);

        return call_user_func_array([new static($stylesheet), 'add'], $stylesheets);
    }

    /**
     * Returns the Stylesheet or creates a new Stylesheet if an array was passed
     *
     * @param Stylesheet|array $stylesheet
     * @param bool             $copy
     *
     * @return \Relaxsd\Stylesheets\Stylesheet
     */
    public static function stylesheet($stylesheet, $copy = false)
    {
        return ($copy || is_array($stylesheet))
            ? new Stylesheet($stylesheet)
            : $stylesheet;
    }

}
