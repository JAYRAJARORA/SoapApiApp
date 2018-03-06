<?php

namespace AppBundle\Constants;

class SoapConstants
{
    const AUTHENTICATION_ERROR = 'Kindly provide the correct user credentials';
    const OBJECT_NOT_FOUND = 'No Atom Object Found';
    const ACCESS_DENIED_TO_URL = 'The requested url cant be accessed';
    const ACCESS_DENIED_TO_USER = 'This user does not have access to this section.';
    const ELEMENT_REQUIRED = 'Element is required';
    const HEADER_REQUIRED = 'Header is required';
    const CLIENT_FAULT_CODE = 'Client';
    const SERVER_FAULT_CODE = 'Server';
    const WSDL = 'http://soapapi.test/public/WSDL/PeriodicTable.wsdl';
    const CONTENT_TPYE = 'Content-Type';
    const XML_CONTENT_VALUE = 'text/xml; charset=ISO-8859-1';
}