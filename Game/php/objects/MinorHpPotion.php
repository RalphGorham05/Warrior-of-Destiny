<?php
	include_once('Potion.php');
	
	class MinorßHpPotion extends Potion
	{
		public function usePotion($callingPlayerHp)
		{
			$hpToAdd = $callingPayerHp * 0.02; //boots HP by 2% of players full HP
			return $hpToAdd;
		}
	}
?>