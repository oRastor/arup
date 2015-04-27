<?php

/**
 * Description of autoParser
 *
 * @author Rastor
 */
class AutoParser {

    const FUEL_TYPE_NAME = 'Тип топлива';
    const GEARBOX_TYPE_NAME = 'Тип коробки передач';
    const MILAGE_NAME = 'Пробег';

    protected $_additionalParameters = array(
        'не на ходу.' => 'broken',
        'после ДТП.' => 'accident',
        'не растаможен' => 'customsProblem'
    );
    protected $_gearboxTypes = array(
        'Автомат' => 'automatic',
        'Адаптивная' => 'adaptive',
        'Вариатор' => 'CVT',
        'Ручная / Механика' => 'manual',
        'Типтроник' => 'tiptronic'
    );
    protected $_fuelTypes = array(
        'Бензин' => 'benzine',
        'Дизель' => 'diesel',
        'Газ' => 'gas',
        'Газ/бензин' => 'gasBenzine',
        'Гибрид' => 'hybrid',
        'Электро' => 'electro',
        'Другое' => 'other',
        'Газ метан' => 'methaneGas',
        'Газ пропан-бутан' => 'propaneButaneGas'
    );

    protected function _removeSpaces($value) {
        return trim(str_replace('&nbsp;', '', $value));
    }

    protected function _getTagText($innerHtml) {
        return preg_replace('#<(.*)>#', '', $innerHtml);
    }

    protected function _getNumeric($value) {
        return (int) preg_replace('/\D/', '', $value);
    }

    protected function _getMySQLDateFormat($value) {
        //07:46:05 29.03.2014 to 2014-03-29 07:46:05
        return preg_replace('#(\d{2}):(\d{2}):(\d{2})\s(\d{2}).(\d{2}).(\d{4})#', '$6-$5-$4 $1:$2:$3', $value);
    }

    public function getAutoDetails($id) {
        $response = @file_get_contents('http://auto.ria.com/blocks_search/view/auto/' . $id . '/?lang_id=2&view_type_id=0&strategy=default&domain_zone=com&user_id=0');

        if (!$response) {
            return false;
        }

        $html = str_get_html($response);

        $block = $html->find('div[ticket_auto_id]', 0);

        if ($block->ticket_auto_id == $id) {
            $data = array(
                'itemId' => $block->ticket_auto_id,
            );

            $data['fullInfoUrl'] = $html->find('.view-all', 0)->find('a', 0)->href;
            $data['dateAdd'] = $this->_getMySQLDateFormat($html->find('.date-add', 0)->pvalue);

            $data['city'] = $html->find('.city', 0)->find('a', 0)->href;
            $data['cityName'] = $html->find('.city', 0)->find('a', 0)->innertext;

            $data['name'] = $this->_removeSpaces($this->_getTagText($html->find('.head-car', 0)->find('a', 0)->innertext));
            $data['year'] = $this->_removeSpaces($this->_getTagText($html->find('.head-car', 0)->innertext));
            $data['thumbnail'] = $this->_removeSpaces($html->find('.ticket-photo', 0)->find('img', 0)->src);

            $usdSpan = $html->find('.definition-data', 0)->find('[title="USD"]', 0);
            if (isset($usdSpan)) {
                $data['price'] = $this->_getNumeric($usdSpan->innertext);
            }

            $data['description'] = $this->_removeSpaces($html->find('.descriptions-ticket', 0)->innertext);

            foreach ($html->find('.definition-data', 0)->find('span') as $value) {
                $key = $this->_removeSpaces($value->innertext);
                if (isset($this->_additionalParameters[$key])) {
                    $data[$this->_additionalParameters[$key]] = 1;
                }
            }

            foreach ($html->find('.item-char') as $value) {
                $type = $this->_removeSpaces($this->_getTagText($value->title));
                $value = $this->_removeSpaces($this->_getTagText($value->innertext));
                switch ($type) {
                    case self::FUEL_TYPE_NAME:
                        $parts = explode(',', $value);
                        if (count($parts) == 2) {
                            if (isset($this->_fuelTypes[$parts[0]])) {
                                $data['fuel'] = $this->_fuelTypes[$parts[0]];
                            }
                            $data['displacement'] = (float) $parts[1];
                        }
                        break;
                    case self::MILAGE_NAME:
                        $data['mileage'] = (int) $value;
                        break;
                    case self::GEARBOX_TYPE_NAME:
                        if (isset($this->_gearboxTypes[$value])) {
                            $data['gearbox'] = $this->_gearboxTypes[$value];
                        }
                        break;
                }
            }

            return $data;
        }

        return false;
    }

}
