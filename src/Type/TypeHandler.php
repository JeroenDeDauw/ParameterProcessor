<?php

namespace ParameterProcessor\Type;

/**
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class TypeHandler {

	private $parser;

	private $validator;

	public function __construct( ParamParser $parser, ParamValidator $validator ) {
		$this->parser = $parser;
		$this->validator = $validator;
	}

}
