<?php
/* Please retain this copyright header in all versions of the software
 *
 * Copyright (C) 2017 Ivo Bathke
 *
 * It is published under the MIT Open Source License.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

$sMetadataVersion = '2';
$aModule          = [
    'id'          => 'ivoba_more',
    'title'       => '<strong>Ivo Bathke</strong>:  <i>More Link</i>',
    'description' => 'Split category text by adding a more token.',
    'thumbnail'   => 'ivoba-oxid.png',
    'version'     => '1.0',
    'author'      => 'Ivo Bathke',
    'email'       => 'ivo.bathke@gmail.com',
    'url'         => 'https://oxid.ivo-bathke.name#more',
    'extend'      => [\OxidEsales\Eshop\Application\Model\Category::class => \IvobaOxid\More\Application\Model\Category::class],
    'blocks'      => [
        ['template' => 'page/list/list.tpl', 'block' => 'page_list_listbody', 'file' => '/views/blocks/more_category_desc.tpl']
    ],
    'settings'    => [
        ['group' => 'ivoba_more_main', 'name' => 'ivoba_more_token', 'type' => 'str', 'value' => '###more###'],
    ],
];

/*
 * find in list.tpl (Flow):
 * [{if $actCategory->oxcategories__oxlongdesc->value && $oPageNavigation->actPage == 1}]
            <div id="catLongDescLocator" class="categoryDescription">[{oxeval var=$actCategory->oxcategories__oxlongdesc}]</div>
            <hr/>
   [{/if}]

   replace wit:

 */