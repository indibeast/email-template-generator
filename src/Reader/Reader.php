<?php
namespace EmailTemplate\Reader;

use EmailTemplate\Exceptions\FileException;
use EmailTemplate\ReadWriteTrait;

class Reader {

    use ReadWriteTrait;

    /**
     * @return string
     * @throws FileException
     */
    public function readeFile()
    {
        return $this->openFile();
    }

    /**
     * @return bool
     * @throws FileException
     */
    protected function isFileReadable()
    {
        return is_readable($this->getFileName());
    }

    /**
     * @return string
     * @throws FileException
     */
    protected function openFile()
    {
        if(!$this->isFileReadable()) {

            throw new FileException(sprintf('Filepath %s is not writable',$this->getFileName()));
        }

        return file_get_contents($this->getFileName());

    }






}