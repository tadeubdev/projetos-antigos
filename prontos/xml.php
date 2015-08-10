<?php


class SimpleXMLAttribute extends SimpleXMLElement
{
    public function attr( $name )
    {
        foreach( $this->Attributes() as $key => $val )
        {
            if( $key == $name )
            {
                return (string) $val;
            }
        }
    }
}


$xml = simplexml_load_file( "xml/estilo.xml", 'SimpleXMLAttribute' );



$fundo_image = $xml->fundo->attr('image');