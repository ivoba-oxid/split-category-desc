<?php

namespace IvobaOxid\More\Application\Model;

use OxidEsales\Eshop\Application\Model\Registry;

class Category extends Category_parent
{
    private $excerptDesc = null;
    private $moreDesc = null;
    private $hasMoreDesc = false;

    public function getLongDesc(): string
    {
        $sDesc = $this->oxcategories__oxlongdesc->value;

        if ($sDesc) {
            //todo fetch token from config
//            $token = $slOxid = Registry::getConfig()->getConfigParam('ivoba_more_token');
//            var_dump($token);
//            exit;

            return str_replace('<p class="mg-hidden">###more###</p>', '', $sDesc);
        }

        return '';
    }

    /**
     * @return string
     */
    public function getExcerptDesc(): string
    {
        if ($this->excerptDesc === null) {
            $this->_splitDescription();
        }
        if ($this->hasMoreDesc) {
            return $this->excerptDesc;
        }

        return '';
    }

    /**
     * @return string
     */
    public function getMoreDesc(): string
    {
        if ($this->moreDesc) {
            return $this->moreDesc;
        }

        if ($this->moreDesc === null) {
            $this->_splitDescription();
        }

        if ($this->hasMoreDesc) {
            return $this->moreDesc;
        }

        return '';
    }

    /**
     * @return bool
     */
    public function hasMoreDesc(): bool
    {
        return $this->hasMoreDesc;
    }

//    public function __get($sName)
//    {
//        var_dump($sName);exit;
//        if ($sName === 'oxcategories__oxlongdesc') {
//            return $this->getExcerptDesc();
//        }
//
//        return parent::__get($sName);
//    }

    protected function _splitDescription()
    {
        $sDesc             = $this->oxcategories__oxlongdesc->value;
        $this->hasMoreDesc = false;

        if ($sDesc) {
            //todo fetch token from config
            $aDesc             = explode('<p class="mg-hidden">###more###</p>', $sDesc);
            $this->excerptDesc = $aDesc[0];
            if (count($aDesc) > 1) {
                $this->hasMoreDesc = true;
                $this->moreDesc    = $aDesc[1];
            }
        } else {
            $this->excerptDesc = $sDesc;
        }
    }

}