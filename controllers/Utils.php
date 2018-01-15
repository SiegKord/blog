<?php

	class Utils {
		
		public static function getDateTime($strTimezone = "UTC", $timestamp = false) {
			if(!$timestamp)
				$timestamp = time();
		
			date_default_timezone_set($strTimezone);
			$dateTime = date('Y-m-d H:i:s', (int)$timestamp);
			return $dateTime;

		}
		
	}