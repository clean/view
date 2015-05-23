<?php namespace Clean\View;

abstract class AbstractView
{
    protected $data;
    protected $template;
    protected $parent;

    abstract public function render();

    public function __construct($template, array $data = [])
    {
        $this->setTemplate($template);
        $this->setData($data);
    }

    /**
     * Sets path of template file.
     *
     * @param string $template
     * @return self
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * Sets variable inside view.
     *
     * @param string $name
     * @param mixed value
     * @return self
     */
    public function set($name, $value)
    {
        $this->data[$name] = $value;
        return $this;
    }

    /**
     * Sets variables at once.
     *
     * @param array $data
     * @return self
     */
    public function setData(array $data = [])
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @see self::set
     */
    public function __set($name, $value)
    {
        $this->set($name, $value);
    }

    /**
     * Provides magic access to variables inside view
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }

    /**
     * Provides magic ability to do isset on variables
     *
     * @return boolean
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function setParent(View $parent)
    {
        $this->parent = $parent;
        return $this;
    }

    public function __toString()
    {
        try {
            $content = $this->render();

            if ($this->parent) {
                $this->parent->set('content', $content);
                return $this->parent->render();
            }

            return $content;
        } catch (\Exception $e) {
            trigger_error(
                sprintf(
                    '%s::%s -> %s',
                    get_called_class(),
                    __FUNCTION__,
                    $e
                ),
                E_USER_ERROR
            );
            return '';
        }
    }
}
