<?php

	namespace App\Helpers;

	// Add new helpers inside of config > app > aliases

	class PostHelper {

		public static function shorten($post) {
			// Example: echo PostHelper::shorten($post)."<span>...</span>";
			// or reference PostHelper::method inside of another method
			return trim(substr($post->body, 0, 250));
		}

	}