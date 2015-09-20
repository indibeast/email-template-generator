<?php
namespace EmailTemplate\Writer;

use EmailTemplate\Exceptions\FileException;
use EmailTemplate\ReadWriteTrait;

class Writer {

    use ReadWriteTrait;

    /**
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @throws FileException
     */
    public function save()
    {
         if (!$this->writeFile()) {

             throw new FileException('Something went wrong');
         }
    }

    /**
     * @return resource
     * @throws FileException
     */
    protected function openFile()
    {
        if(!$this->isDirWritable())
        {
            throw new FileException(sprintf('Filepath %s is not writable',$this->getFilePath()));
        }
        if (!$filehandle = fopen($this->getFileName(),'w')) {

            throw new FileException('Unable to open file '.$this->getFileName());
        }

        return $filehandle;
    }

    /**
     * @return bool
     * @throws FileException
     */
    protected function writeFile()
    {
        $handle = $this->openFile();
        if ((fwrite($handle,$this->getContent())) === false) {

            throw new FileException('Cannot write file '.$this->getFileName());
        }

        return fclose($handle);
    }

    /**
     * @return bool
     */
    protected function isDirWritable()
    {
        return is_writable($this->dirpath);
    }
}