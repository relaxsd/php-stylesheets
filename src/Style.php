<?php

namespace Relaxsd\Stylesheets;

class Style
{

    /**
     * @var array
     */
    protected $rules = [];

    /**
     * Styles constructor.
     *
     * @param Style|array|null $rules
     */
    public function __construct($rules = null)
    {
        if (isset($rules)) {
            $this->add($rules);
        }
    }

    /**
     * Adds a Style or rules to this Style.
     * To create a copy, use the static merged() method instead.
     *
     * @param Style|array      $style
     * @param Style|array|null $_
     *
     * @return \Relaxsd\Stylesheets\Style
     */
    public function add($style, $_ = null)
    {
        foreach (func_get_args() as $style) {

            $rules       = ($style instanceof Style)
                ? $style->rules
                : $style;
            $this->rules = array_merge($this->rules, $rules);

        }

        return $this;
    }

    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return $this
     */
    public function addRule($name, $value)
    {
        $this->rules[$name] = $value;

        return $this;
    }

    /**
     * Returns the value for a given attribute (e.g. 'border').
     *
     * @param string $attribute
     *
     * @return null|mixed The value or null if not found.
     */
    public function getValue($attribute)
    {
        return array_key_exists($attribute, $this->rules)
            ? $this->rules[$attribute]
            : null;
    }

    /**
     * Creates a copy of this object.
     *
     * @return \Relaxsd\Stylesheets\Style
     */
    public function copy()
    {
        return new static($this->rules);
    }

    /**
     * @param float      $factorH
     * @param float|null $factorV
     *
     * @return $this
     */
    public function scale($factorH, $factorV = null)
    {
        $factorV = isset($factorV) ? $factorV : $factorH;

        foreach ($this->rules as $attribute => &$value) {
            if ($attribute == 'size' || self::endsWith($attribute, '-size')) {
                $value *= $factorH;
            }
        }
        return $this;
    }

    /**
     * Returns a scaled copy of this stylesheet.
     *
     * @param Style|array $style
     * @param float       $factorH
     * @param float|null  $factorV
     *
     * @return $this
     */
    public static function scaled($style, $factorH, $factorV = null)
    {
        return (new static($style))->scale($factorH, $factorV);
    }

    /**
     * Returns a copy of a stylesheet
     *
     * @param Style|array      $style
     * @param Style|array|null $_
     *
     * @return \Relaxsd\Stylesheets\Style
     */
    public static function merged($style, $_)
    {
        $styles = func_get_args();

        $style = array_shift($styles);

        return call_user_func_array([new static($style), 'add'], $styles);
    }

    /**
     * Returns the Style or creates a new Style if an array was passed
     *
     * @param Style|array $style
     * @param bool        $copy
     *
     * @return \Relaxsd\Stylesheets\Style
     */
    public static function style($style, $copy = false)
    {
        return ($copy || is_array($style))
            ? new Style($style)
            : $style;
    }

    private static function endsWith($haystack, $needle)
    {
        return ((string)$needle === substr($haystack, -strlen($needle)));
    }

}
