<?php

namespace ParameterProcessor\Processor;

use InvalidArgumentException;

/**
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class ProcessingError {

	const IS_FATAL = true;
	const NOT_FATAL = false;

	private $code;
	private $message;
	private $isFatal;
	private $paramName;
	private $paramValue;

	public static function newInstance( array $data ) {
		self::assertHasElement( $data, 'errorCode' );
		self::assertHasElement( $data, 'errorMessage' );
		self::assertHasElement( $data, 'isFatal' );
		self::assertHasElement( $data, 'paramName' );
		self::assertHasElement( $data, 'paramValue' );

		$error = new self();

		$error->code = $data['errorCode'];
		$error->message = $data['errorMessage'];
		$error->isFatal = $data['isFatal'];
		$error->paramName = $data['paramName'];
		$error->paramValue = $data['paramValue'];

		return $error;
	}

	private static function assertHasElement( array $data, $elementName ) {
		if ( !array_key_exists( $elementName, $data ) ) {
			throw new InvalidArgumentException( "$elementName is required" );
		}
	}

	/**
	 * @return string
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * @return bool
	 */
	public function isFatal() {
		return $this->isFatal;
	}

	/**
	 * @return string
	 */
	public function getParamName() {
		return $this->paramName;
	}

	/**
	 * @return mixed
	 */
	public function getParamValue() {
		return $this->paramValue;
	}

}
