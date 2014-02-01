<?php

/**
 * https://github.com/prasad83/Zend-Gdata-Contacts
 * @author prasad
 * 
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Gdata
 * @subpackage Contacts
 */
require_once 'Zend/Gdata/Contacts/Extension.php';

require_once 'Zend/Gdata/Contacts/Extension/FormattedAddress.php';
require_once 'Zend/Gdata/Contacts/Extension/Street.php';

class Zend_Gdata_Contacts_Extension_StructuredPostalAddress extends Zend_Gdata_Contacts_Extension {
	protected $_rootElement = 'structuredPostalAddress';
	
	protected $_rel;
	protected $_formattedAddress, $_street;
	
	public function __construct($value = null, $rel = 'work') {
        parent::__construct();
		$this->_rel = $rel;
		$this->_formattedAddress = new Zend_Gdata_Contacts_Extension_FormattedAddress($value);
    }
	
	public function getDOM($doc = null, $majorVersion = 1, $minorVersion = null) {
		$element = parent::getDOM($doc, $majorVersion, $minorVersion);
		$element->setAttribute("rel", $this->lookupNamespace("gd").'#'.$this->_rel);
		if ($this->_formattedAddress != null) {
			$element->appendChild($this->_formattedAddress->getDOM($element->ownerDocument));
		}
		if ($this->_street != null) {
			$element->appendChild($this->_street->getDOM($element->ownerDocument));
		}
		return $element;
	}
	
	/**
     * Creates individual Entry objects of the appropriate type and
     * stores them as members of this entry based upon DOM data.
     *
     * @param DOMNode $child The DOMNode to process
     */
    protected function takeChildFromDOM($child) {
        $absoluteNodeName = $child->namespaceURI . ':' . $child->localName;
		$gdNamespacePrefix = $this->lookupNamespace('gd') . ':';

        switch ($absoluteNodeName) {
            case $gdNamespacePrefix . 'formattedAddress';
                $formattedAddress = new Zend_Gdata_Contacts_Extension_FormattedAddress();
                $formattedAddress->transferFromDOM($child);
                $this->_formattedAddress = $formattedAddress;
                break;
			case $gdNamespacePrefix . 'street';
                $street = new Zend_Gdata_Contacts_Extension_Street();
                $street->transferFromDOM($child);
                $this->_street = $street;
                break;
        }
    }
	
	public function getValue() {
		return $this->_formattedAddress->getValue();
	}
	
	public function __toString() {
		$string = $this->_formattedAddress->__toString();
		if ($this->_street != null) $string .= "\n" . $this->_street->__toString();
		return trim($string);
	}


	public function setFormattedAddress($value) {
		$this->_formattedAddress = $value;
		return $this;
	}
	
	public function getFormattedAddress() {
		return $this->_formattedAddress;
	}
	
	public function setStreet($value) {
		$this->_street = $value;
		return $this;
	}
	
	public function getStreet() {
		return $this->_street;
	}
}