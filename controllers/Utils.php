<?php

	class Utils {
		
		public static function getDateTime($strTimezone = "UTC") {
		
			$dateTime=NULL;
			
			try {
				$dateTime = new DateTime("now", new DateTimeZone($strTimezone));
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			
			return $dateTime;

		}
		
	}