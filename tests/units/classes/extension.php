<?php

namespace mageekguy\atoum\config\tests\units;

use
	mageekguy\atoum,
	mageekguy\atoum\config\extension as testedClass
;

class extension extends atoum\test
{
	public function testClass()
	{
		$this
			->testedClass
				->hasInterface('mageekguy\atoum\extension')
		;
	}
}
