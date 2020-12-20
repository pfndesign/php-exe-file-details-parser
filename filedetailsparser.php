<?php
/**
 * parse windows file details
 * version 1.1
 * get file full details like (CompanyName,FileDescription,FileVersion,InternalName,LegalCopyright,...)
 * @author peyman farahmand <pfndesigen@gmail.com>
 * @From Iran / Mashhad
 * @License GNU
 */

ini_set('memory_limit', '-1'); // memory limit for big file size

class filedetailsparser
{
    private $detailslist=[
    'CompanyName',
    'FileDescription',
    'FileVersion',
    'InternalName',
    'LegalCopyright',
    'OriginalFilename',
    'ProductName',
    'ProductVersion',
    'CompanyShortName',
    'ProductShortName',
    'LastChange',
    'LegalTrademarks',
    'LegalTrademarks1',
    'LegalTrademarks2',
    'BuildID',
    'UpdateSystemVersion',
    'Source Control ID',
    'FileSize',
    'Comments',
    'FileBuildPart',
    'FileMajorPart',
    'FileMinorPart',
    'FileName',
    'FilePrivatePart',
    'IsDebug',
    'IsPatched',
    'IsPreRelease',
    'IsPrivateBuild',
    'IsSpecialBuild',
    'Language',
    'PrivateBuild',
    'ProductBuildPart',
    'ProductMajorPart',
    'ProductMinorPart',
    'ProductPrivatePart',
    'SpecialBuild',
  ];
    private $filedata;
    private $detailstring;
    private $data = [];

    public function __construct($filepath)
    {
        if (file_exists($filepath)) {
            $this->getfiledata($filepath);
            $this->getdetailsblock();
            $this->parsedetailslist();
        } else {
            throw new Exception("{$filepath} was not found");
        }
    }
    private function getfiledata($filepath)
    {
        $handle = fopen($filepath, "r");
        $filesize = filesize($filepath);
        $this->data['filesize'] = $filesize;
        $this->data['pathinfo'] = pathinfo($filepath);
        $this->filedata = fread($handle, $filesize);
        fclose($handle);
    }
    private function getdetailsblock()
    {
        $contents = filter_var($this->filedata, FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW);
        //echo $contents;
        //die();
        if (preg_match('/CompanyName([^{$]*)VarFileInfo/', $contents, $contents_fileinfo)) {
            $detailstring = $contents_fileinfo[1];
        } elseif (preg_match('/CompanyName([^{]*)VarFileInfo/', $contents, $contents_fileinfo)) {
            $detailstring = $contents_fileinfo[1];
        } elseif (preg_match('/CompanyName([^{]*){/', $contents, $contents_fileinfo)) { //notepad++ fix
              $detailstring = $contents_fileinfo[1];
        } else {
            throw new Exception("details block was not found");
        }
        $detailstring = str_replace($this->detailslist, array_map(function($value) { return '#'.$value; }, $this->detailslist), $detailstring);
        $detailstring = filter_var("CompanyName".$detailstring."#", FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
        $this->detailstring = $detailstring;
    }
    private function parsedetailslist()
    {
        foreach ($this->detailslist as $key => $tag) {
            if (preg_match('/'.$tag.'([^#]*)#/', $this->detailstring, $match)) {
                $match = trim($match[1]);
                $cleandata = $this->cleandetailstext($match);
                $this->data[strtolower($tag)] = $cleandata;
            }
        }
    }
    private function cleandetailstext($string)
    {
        $lastchar = substr($string, -1);
        $cleandata = preg_replace('/[^\da-z.\- ]/i', '', $string);
        $lastcharafterclean = substr($cleandata, -1);
        if (!preg_match('/[^\da-z.\- ]/i', $lastchar) || $lastchar == $lastcharafterclean) {
            $cleandata = substr($cleandata, 0, -1);
        }
        return $cleandata;
    }
    public function getdata($type='array')
    {
        if ($type=='object') {
            return (object)$this->data;
        } else {
            return $this->data;
        }
    }
    public function getbykeyname($keyname, $type='array')
    {
        if (isset($this->data[$keyname])) {
            if (is_array($this->data[$keyname]) && $type=='object') {
                return (object) $this->data[$keyname];
            } else {
                return $this->data[$keyname];
            }
        } else {
            return false;
        }
    }
    public function getdatalist($keylist, $type='array')
    {
        if (is_array($keylist)) {
            if ($type=='object') {
                return (object) array_intersect_key($this->data, array_flip($keylist));
            } else {
                return array_intersect_key($this->data, array_flip($keylist));
            }
        } else {
            return $this->data;
        }
    }
}
