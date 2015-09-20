<?php
namespace EmailTemplate\Render;

use EmailTemplate\Render\RenderInterface;
use Jenssegers\Blade\Blade;

class BladeRender implements RenderInterface{
    /**
     * @var string
     */
    protected $views;
    /**
     * @var string
     */
    protected $cache;
    /**
     * @var \Jenssegers\Blade\Blade
     */
    protected $blade;

    /**
     * @param $views
     * @param $cache
     */
    public function __construct($views,$cache)
    {
        $this->views = $views;
        $this->cache = $cache;
        $this->setBlade();
    }

    /**
     * @param $file
     * @param array $data
     * @return mixed
     */
    public function render($file,$data = [])
    {
        return $this->blade->make($file,$data)->render();
    }

    /**
     *
     */
    protected function setBlade()
    {
        $this->blade = new Blade($this->views,$this->cache);
    }


}