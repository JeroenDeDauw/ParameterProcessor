<?php

namespace ParameterProcessor\Processor;

use ParameterProcessor\Param\ParamSpecList;
use ParameterProcessor\Type\TypeHandlerList;

/**
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class Processor {

	private $typeHandlers;
	private $specifications;

	/**
	 * @var ProcessingResult
	 */
	private $result;

	public function __construct( TypeHandlerList $typeHandlers, ParamSpecList $specs ) {
		$this->typeHandlers = $typeHandlers;
		$this->specifications = $specs;
	}

	/**
	 * Takes an array of input parameters to process.
	 * The array keys need to be the parameter names.
	 *
	 * @param array $inputParams
	 *
	 * @return ProcessingResult
	 */
	public function process( array $inputParams ) {
		/**
		 * Tasks:
		 * - normalization of param names (inc alias handling)
		 * - parsing of the values
		 * - validating of the values
		 * - (tracking of errors)
		 * - (tracking of original values and param names)
		 *
		 * Out of scope:
		 * - input parameter list building (ie parameter defaulting (a dedicated service can be provided))
		 * - dependency resolving
		 * - i18n (or even definition of i18n keys)
		 *
		 * Changes with ParamProcessor:
		 * - no parameter defaulting
		 * - no dependency resolving
		 * - no i18n
		 * - parameters to be handled in isolation (no access to the processing state, ie other params)
		 * - no differentiation between string and typed input modes
		 *
		 * Open questions:
		 * - how to best support lists
		 * - how to handle common criteria such as whitelist and blacklist (in here perhaps?)
		 * - are any valid usecases prevented by the isolation?
		 */

		$this->result = new ProcessingResult();

		foreach ( $inputParams as $name => $value ) {
			$this->processParam( $name, $value );
		}

		// TODO: for non found ones, either default or error

		return $this->result;
	}

	private function processParam( $name, $value ) {
		$this->result->addError( [
			'errorCode' => 'unknown-param',
			'errorMessage' => '',
			'isFatal' => false,
			'paramName' => $name,
			'paramValue' => $value,
		] );

//		$spec = $this->getSpecFor( $name );
//		$type = $this->getType( $spec->getTypeName() );
//
//		$parsedValue = $type->getParser()->parse( $value );
//		$type->getParser()->validate( $parsedValue );
//
//		$this->result->addParam( $name, $value, $parsedValue );
	}

}
