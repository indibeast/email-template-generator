<?php

namespace EmailTemplate;


use EmailTemplate\Exceptions\FileException;

trait ReadWriteTrait {

    /**
     * @var string
     */
    protected $dirpath;
    /**
     * @var string
     */
    protected $ext = '.blade.php';
    /**
     * @var string
     */
    protected $content = '';
    /**
     * @var string
     */
    protected $filename;

    /**
     * @param $filepath
     */
    public function __construct($filepath)
    {
        $this->dirpath = $filepath;
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->dirpath;
    }

    /**
     * @param bool $path
     * @return string
     * @throws FileException
     */
    public function getFileName($path = true)
    {

        if (!$this->isFileNameSet()) {
            throw new FileException('File is not set');
        }

        if ($path) {
            return $this->dirpath.DIRECTORY_SEPARATOR.$this->filename.$this->ext;
        }
        return $this->filename.$this->ext;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


    /**
     * @return bool
     */
    protected function isFileNameSet()
    {
        return !is_null($this->filename);
    }
    /**
     * @param $filename
     * @return $this
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
        return $this;
    }
}