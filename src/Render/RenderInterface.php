<?php
namespace EmailTemplate\Render;

interface RenderInterface {
    /**
     * @param $file
     * @param array $data
     * @return mixed
     */
    public function render($file,$data = []);
}