<?php

namespace ParameterProcessor\Processor;

/**
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class ProcessingResult {

	/**
	 * @var ProcessingError[]
	 */
	private $errors = [];

	/**
	 * Returns the processed parameters as associative array,
	 * where the keys are the parameter names and the values
	 * are the processed parameters.
	 *
	 * @return array
	 */
	public function getParameters() {
		// TODO
		return [];
	}

	/**
	 * Returns the processed parameters as associative array,
	 * where the keys are the parameter names and the values
	 * are the processed parameters.
	 *
	 * @return ProcessingError[]
	 */
	public function getErrors() {
		return $this->errors;
	}

	public function addError( $array ) {
		$this->errors[] = ProcessingError::newInstance( $array );
	}

}
