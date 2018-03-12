<?php
/**
 * Constants used in Soap Apis for error Codes,
 * duplicated strings and fault codes
 *
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  Constant
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
namespace AppBundle\Constants;

/**
 * Class SoapConstants
 *
 * @category Constant
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class SoapConstants
{
    // Server Side Faults shown to user
    const AUTHENTICATION_ERROR = 'Kindly provide the correct user credentials';
    const OBJECT_NOT_FOUND = 'No Atom Object Found';
    const ACCESS_DENIED_TO_URL = 'The requested url cant be accessed';
    const ACCESS_DENIED_TO_USER = 'This user does not have access to this section.';
    const ELEMENT_REQUIRED = 'Element is required';
    const HEADER_REQUIRED = 'Header is required';
    const INVALID_ELEMENT_NAME = 'Element Name can contain only alphabets';
    const INVALID_ELEMENT_SYMBOL = 'Element Symbol can contain only alphabets';
    const INVALID_ATOMIC_NUMBER = 'Atomic Number can contain only integers';
    const INVALID_ATOMIC_WEIGHT = 'Atomic Weight can contain only decimal or integers';
    const ELEMENT_NAME_EXISTS = 'Element Name already exists';
    const ELEMENT_SYMBOL_EXISTS = 'Element Symbol already exists';
    const ATOMIC_NUMBER_EXISTS = 'Atomic Number already exists';
    const KEY_MISSING = 'Some of the required fields are missing';
    const INVALID_XML = 'Invalid Cdata Format in XML';
    // Type of fault
    const CLIENT_FAULT_CODE = 'Client';
    const SERVER_FAULT_CODE = 'Server';
    // WSDL to work through client and server
    const WSDL = 'http://soapapi.test/public/WSDL/PeriodicTable.wsdl';
    // Setting XML response
    const CONTENT_TPYE = 'Content-Type';
    const XML_CONTENT_VALUE = 'text/xml; charset=ISO-8859-1';
    // Duplicated Strings
    const ATOM_FORM_LABEL = 'label';
    const ATOM_FORM_PLACEHOLDER = 'placeholder';
    const ATOM_FORM_CLASS = 'class';
    const ATOM_FORM_ATTRIBUTE = 'attr';
    const ATOM_FORM_FORM_CONTROL = 'form-control';
    const ATOM_REPOSITORY = 'AppBundle:Atom';
    const ELEMENT_NAME = 'elementName';
    const VALIDATE_REQUEST = 'validate';
}
