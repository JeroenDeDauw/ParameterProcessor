<?php

namespace ParameterProcessor\Param;

/**
 * Decoratively specifies the contract for a parameter.
 * This includes things such as type, required, is list, default value and allowed values.
 * Also includes type specific things such as upper bound and max length.
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class ParamSpec {

	public $name;

	/**
	 * @var string
	 */
	public $type;

	/**
	 * @return boolean
	 */
	public function isList() {

	}

}
