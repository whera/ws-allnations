<?php

namespace WSW\AllNations\Requests;

use Cake\Utility\Xml;
use Cake\Utility\Exception\XmlException;
use WSW\AllNations\AllNationsException;

abstract class Serializer
{
    /**
     * @param string $string
     * @return Array
     * @throws AllNationsException
     */
    public static function toArrayProducts($string = '')
    {
        try {
            $arr = Xml::toArray(simplexml_load_string($string));

            if (!isset($arr['DataSet']['diffgr:diffgram']['NewDataSet']['Produtos'])) {
                throw new AllNationsException('We did not find the tag \'Products\' on consultation');
            }

            return $arr['DataSet']['diffgr:diffgram']['NewDataSet']['Produtos'];

        } catch (XmlException $e) {
            throw new AllNationsException($e->getMessage());
        }
    }
}
