<?php

namespace IvobaOxid\SplitCategoryDesc\Application\Model;

use OxidEsales\Eshop\Core\Field;
use OxidEsales\Eshop\Core\Registry;

class Category extends Category_parent
{
    const CONFIG_PARAM = 'ivoba_split_category_desc_token';

    protected $originalLongDesc = null;
    protected $moreDesc = '';
    protected $hasMoreDesc = false;

    public function getLongDesc()
    {
        $sDesc = $this->originalLongDesc;

        if ($sDesc) {
            $token = $slOxid = Registry::getConfig()->getConfigParam(self::CONFIG_PARAM);

            return str_replace($token, '', $sDesc);
        }

        return parent::getLongDesc();
    }

    /**
     * @return string
     */
    public function getMoreDesc(): string
    {
        return $this->moreDesc;
    }

    /**
     * @return bool
     */
    public function hasMoreDesc(): bool
    {
        return $this->hasMoreDesc;
    }

    /**
     * @return null|string
     */
    public function getOriginalLongDesc()
    {
        return $this->originalLongDesc;
    }

    public function load($sOXID)
    {
        $ret = parent::load($sOXID);

        if ($ret && $this->isAdmin() === false) {
            $this->_splitDescription();
        }

        return $ret;
    }

    protected function _splitDescription()
    {
        $sDesc             = $this->oxcategories__oxlongdesc->value;
        $this->hasMoreDesc = false;

        if ($sDesc) {
            $token = $slOxid = Registry::getConfig()->getConfigParam(self::CONFIG_PARAM);
            $aDesc = explode($token, $sDesc);
            if (count($aDesc) > 1) {
                $this->hasMoreDesc              = true;
                $string                         = $aDesc[0].'<p class="split-category-desc"><a class="btn btn-primary" href="#moreCatDesc">'.
                    Registry::getLang()->translateString('IVOBA_SPLIT_CATEGORY_DESC_READMORE').
                    '</a></p>';
                $this->oxcategories__oxlongdesc = new Field($string);
                $this->moreDesc = $aDesc[1];
            }
        }
    }

}