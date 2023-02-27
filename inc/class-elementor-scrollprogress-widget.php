<?php
if ( ! class_exists( 'TM_SP' ) ) {
	class TM_SP {
		function register() {
			add_action(
				'wp_enqueue_scripts',
				[
					$this,
					'enqueue_front',
				]
			);
		}

		public function enqueue_front() {
			wp_enqueue_style( 'scrollprogress_style', TM_SP_URL . 'assets/css/scroll.css' );
			wp_enqueue_script( 'scrollprogress_script', TM_SP_URL . 'assets/js/scrollbar.js', array( 'jquery' ), TM_SP_VERSION, true );
		}

		static function activation() {
			flush_rewrite_rules();
		}

		static function deactivation() {
			flush_rewrite_rules();
		}
	}
}
