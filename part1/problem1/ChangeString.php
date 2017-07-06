<?php

class ChangeString
{
	public function build(String $string)
	{
		return $this->converString($string);
	}

	private function converString(String $string)
	{
		for ($i=0; $i < strlen($string) ; $i++):
			$string[$i] = $this->replaceChar( $string[$i] );
		endfor;

		return $string;
	}

	private function replaceChar($char)
	{
		$char_ascii = ord($char);
		$new_char_ascii = ord($char);

		//If char is between the ascii code in Capital Letter or Lower case, we just add +1 and we get the next char, in case is the last one, we subtract 25, because between a,b .. z are 25 chars
		if($char_ascii >= 97 && $char_ascii <= 122 || $char_ascii >= 65 && $char_ascii <= 90 )
			if($char_ascii == 122 || $char_ascii == 90 )
				$new_char_ascii = $char_ascii - 25;
			else
				$new_char_ascii = $char_ascii + 1 ;

		return chr($new_char_ascii);
	}
}