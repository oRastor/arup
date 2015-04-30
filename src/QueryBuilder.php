<?php

namespace AutoGrabber;

/**
 * Description of QueryBuilder
 *
 * @author root
 */
class QueryBuilder
{

    protected $options = array();

    public function addOption(QueryOptions\AbstractOption $option)
    {
        $name = $option->getQueryOptionName();
        
        $this->options[$name] = $option;
        
        return $this;
    }

    public function setPriceFrom($value)
    {
        $priceFrom = new QueryOptions\PriceFromOption($value);
        $this->addOption($priceFrom);
        
        return $this;
    }

    public function setPriceTo($value)
    {
        $priceTo = new QueryOptions\PriceToOption($value);
        $this->addOption($priceTo);
        
        return $this;
    }

    public function getQuery()
    {
        $result = array();
        
        foreach ($this->options as $key => $value) {
            $result[$key] = $value->getQueryOptionValue();
        }
        
        return http_build_query($result);
    }

}
