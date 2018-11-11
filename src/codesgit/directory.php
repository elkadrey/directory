<?php namespace codesgit;
class directory
{
    public function __construct($dir = null) 
    {
        if($dir) $this->set($dir);
    }
    
    public function makePath($dir)
    {
        if(substr($dir, strlen($dir) - 1, 1) != '/') $dir .= '/';
        return $dir;
    }
    
    private $currentDir = "";
    private $IndexFileMode = true;


    public function set($dir)
    {
        if(!empty($dir) && is_dir($dir))
        {
            $this->currentDir = $this->makePath($dir);
            return $this->currentDir;
        }
        else return null;
    }
    
    public function clear()
    {
        $this->currentDir = "";
    }
    
    public function setFileIndexMode($mode = true)
    {
        $this->IndexFileMode = $mode;
    }
    
    public function create($dirPath, $createIndexFile = null, $showError = false, $addTo = '')
    {
        $dirs = explode("/", $dirPath);  
        if($createIndexFile === null) $createIndexFile = $this->IndexFileMode;
        
        if(!empty($this->currentDir) && empty($addTo)) $addTo = $this->currentDir;
        $dir = $addTo;
        $mkDir = TRUE;
        foreach($dirs as $folder)
        {
            $folder = trim($folder);
            if($folder)
            {            
                $dir .= $folder.'/';
                if(!is_dir($dir)) $mkDir = @mkdir($dir);
                if($createIndexFile && !file_exists($dir.'index.html')) $this->saveFile($dir.'index.html','');
            }
        }
        if($mkDir) return $dir;
        else return null;
    }

    public function delete($path, $addCurrentDir = true)
    {
        $path = $this->makePath(($addCurrentDir ? $this->currentDir : "").$path);
        $fldr = @opendir($path);
        if($fldr)
        {
            while(($fils = readdir($fldr)) !== false)
            {
                if(is_dir($path.'/'.$fils) && $fils != "." && $fils != "..") $this->delete($path.'/'.$fils, false);
                else @unlink($path.'/'.$fils);
            }
            closedir($fldr);
            $del = @rmdir($path);
            if($del) return true;
        }
    }


    function saveFile($filePath, $data = '')
    {
        return @file_put_contents($filePath, $data);
    }
}