<?php namespace Clean\View;

class Phtml extends AbstractView
{
    /**
     * var callable
     */
    protected static $helperProvider;

    /**
     * Sets callback used as a helper provider in view (e.g. $this->method())
     *
     * @param $func callable
     * @return void
     */
    public static function setHelperProvider(callable $func)
    {
        self::$callback = $func;
    }

    /**
     * Magic call to invoke helper from helperProvider
     *
     * @param $name Name of the helper
     * @param $args Parameters to pass to helper
     *
     * @retrun mixed
     */
    public function __call($name, $args)
    {
        if (!self::$helperProvider) {
            throw new \LogicException('Helper provider not set.');
        }

        return call_user_func(self::$helperProvider, $name, $args);
    }

    /**
     * Renders template and returns renderer content.
     *
     * @return string
     */
    public function render()
    {
        if (!is_readable($this->template) || !is_file($this->template)) {
            throw new \RuntimeException('Cannot read template ' . $this->template);
        }

        ob_start();
        include $this->template;
        return ob_get_clean();
    }
}
