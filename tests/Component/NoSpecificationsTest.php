<?php

namespace ParameterProcessor\Tests\Component;

use ParameterProcessor\Param\ParamSpecList;
use ParameterProcessor\Processor\ProcessingError;
use ParameterProcessor\Processor\ProcessingResult;
use ParameterProcessor\Processor\Processor;
use ParameterProcessor\Type\TypeHandlerList;

/**
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class NoSpecificationsTest extends \PHPUnit_Framework_TestCase {

	public function testGivenNoParameters_emptyResultIsReturned() {
		$processor = new Processor( new TypeHandlerList(), new ParamSpecList() );

		$result = $processor->process( [] );

		$this->assertResultIsEmpty( $result );
	}

	private function assertResultIsEmpty( ProcessingResult $result ) {
		$this->assertSame( [], $result->getParameters() );
		$this->assertSame( [], $result->getErrors() );
	}

	public function testGivenSomeParameters_resultWithErrorsIsReturned() {
		$processor = new Processor( new TypeHandlerList(), new ParamSpecList() );

		$result = $processor->process( [
			'foo' => 'bar',
			'baz'=> 'bah'
		] );

		$this->assertSame( [], $result->getParameters() );

		$this->assertEquals(
			[
				ProcessingError::newInstance( [
					'errorCode' => 'unknown-param',
					'errorMessage' => '',
					'isFatal' => false,
					'paramName' => 'foo',
					'paramValue' => 'bar',
				] ),
				ProcessingError::newInstance( [
					'errorCode' => 'unknown-param',
					'errorMessage' => '',
					'isFatal' => false,
					'paramName' => 'baz',
					'paramValue' => 'bah',
				] )
			],
			$result->getErrors()
		);
	}

}
