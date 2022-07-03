<?php
    namespace Livro\Core;

    use RecursiveArrayIterator;

    use RecursiveDirectoryIterator;

    use Exception;

    class AppLoader {
        protected $directories;

        public function addDirectory($directory){
            $this->directories[] = $directory;
        }

        public function register(){
            spl_autoload_register(array($this, 'loadClass'));
        }

        public function loadClass($class){
            
        }
    }