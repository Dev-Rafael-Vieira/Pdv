<?php

	class System{
		public function __construct($view){
			if (file_exists("mvc/views/{$view}.php")) {
				$file =$view;
			}else{
				$file ='404';
			}
			
			$this->get_header();

			include('mvc/views/'.$file.'.php');

			$this->get_footer();
		}
		private function get_header(){
			include('mvc/common/header.php');
		}

		private function get_footer(){
			include('mvc/common/footer.php');
		}
	}