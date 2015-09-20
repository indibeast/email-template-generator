<?php
namespace EmailTemplate\Test;

use EmailTemplate\Reader\Reader;
use EmailTemplate\Render\BladeRender;
use EmailTemplate\Writer\Writer;

class FileTest extends \PHPUnit_Framework_TestCase {

    public function test_file_writer()
    {
        $filewriter = new Writer(__DIR__ . '/../files/');
        $content = 'Hi {{$name}}';
        $filewriter->setFilename('sample')->setContent($content)->save();
        $this->assertEquals(__DIR__ . '/../files/',$filewriter->getFilePath());
        $this->assertEquals($content,$filewriter->getContent());
        $this->assertEquals(__DIR__ . '/../files/sample.blade.php',$filewriter->getFileName());
        $this->assertFileExists(__DIR__ . '/../files/sample.blade.php');
    }

    public function test_file_reader()
    {
        $reader = new Reader(__DIR__ . '/../files/');

        $this->assertEquals('Hi {{$name}}',$reader->setFilename('sample')->readeFile());
    }

    public function test_blade_render()
    {
        $reader = new BladeRender(__DIR__ . '/../files',__DIR__ . '/../cache');

        $this->assertEquals('Hi Indika',$reader->render('sample',['name' => 'Indika']));
    }
}