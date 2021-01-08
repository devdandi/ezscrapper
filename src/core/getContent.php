<?php 
namespace core;
use DOMDocument;
use DOMXpath;
use Exception;

require_once __DIR__ . '/cURL.php';

class getContent extends cURL{
    
    public $output;

    public function store($output)
    {
        $this->output = $output;
    }

    private function _init()
    {
        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($this->output['data']);
        libxml_clear_errors();
        $xpath = new DOMXpath($dom);
        return $xpath;
    }

    public function getTable($table_class_name)
    {
        $data = '';
        $xpath = $this->_init();

        $tags = $xpath->query("//*[contains(@class, '$table_class_name')]");
        try {
            foreach($tags as $tag)
            {
                $children = $tag->childNodes;

                foreach($children as $child)
                {
                    $tmp_doc = new DOMDocument;
                    $tmp_doc->appendChild($tmp_doc->importNode($child, true));
                    $data .= $tmp_doc->saveHTML();
                }
            }
            return $data;

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function getText($class_name)
    {
        $data = '';
        $xpath = $this->_init();

        $tags = $xpath->query("//*[contains(@class, '$class_name')]");
        try {
            foreach($tags as $tag)
            {
                $children = $tag->childNodes;

                foreach($children as $child)
                {
                    $tmp_doc = new DOMDocument;
                    $tmp_doc->appendChild($tmp_doc->importNode($child, true));
                    $data .= $tmp_doc->saveHTML();
                }
            }
            return $data;

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}